<?php

namespace App\Http\Controllers\database;

use ZipArchive;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\database\Siswa;
use App\Models\database\Punishment;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\database\PunishmentRequest;


class PunishmentController extends Controller
{
        public function index(Request $request)
    {
        $angkatanList = Siswa::select('angkatan')->distinct()->pluck('angkatan');
        $query = Punishment::with('siswa');

        if ($request->filled('angkatan')) {
            $query->whereHas('siswa', function ($query) use ($request) {
                $query->where('angkatan', $request->angkatan);
            });
        }

        if ($request->filled('id_siswa')) {
            $query->where('id_siswa', $request->id_siswa);
        }

        $dataPunishment = $query->get();

        if ($request->ajax()) {
            return response()->json(['data' => $dataPunishment]);
        }

        return view('database.database.punishment.index', compact('dataPunishment', 'angkatanList'));
    }

    public function exportPdf(Request $request)
    {
        $angkatanFilter = $request->query('angkatan', '');
        $idSiswaFilter = $request->query('id_siswa', '');
        $query = Punishment::with('siswa');

        if ($angkatanFilter) {
            $query->whereHas('siswa', function ($query) use ($angkatanFilter) {
                $query->where('angkatan', $angkatanFilter);
            });
        }

        if ($idSiswaFilter) {
            $query->where('id_siswa', $idSiswaFilter);
        }

        // Ambil data punishment
        $dataPunishment = $query->get();

        // Inisialisasi Dompdf untuk PDF utama
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);

        // Membuat PDF untuk data punishment
        $html = View::make('database.template.punishment', compact('dataPunishment'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dataPunishmentPdfPath = public_path('pdf/data_punishment.pdf');
        file_put_contents($dataPunishmentPdfPath, $dompdf->output());

        // Membuat PDF untuk setiap kronologi
        foreach ($dataPunishment as $index => $data) {
            $dompdf = new Dompdf($options);

            $kronologiHtml = View::make('database.template.punishmentKronologi', compact('data'))->render();
            $dompdf->loadHtml($kronologiHtml);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
            $number = $index + 1;
            $kronologiPdfPath = public_path("pdf/kronologi_pelanggaran_{$number}.pdf");
            file_put_contents($kronologiPdfPath, $dompdf->output());
        }
        return $this->zipPdfFiles();
    }

    private function zipPdfFiles()
    {
        $zip = new ZipArchive;
        $zipFileName = public_path('pdf/punishment_files.zip');

        if ($zip->open($zipFileName, ZipArchive::CREATE) === TRUE) {
            // Tambahkan file PDF utama
            $zip->addFile(public_path('pdf/data_punishment.pdf'), 'data_punishment.pdf');

            // Tambahkan file PDF kronologi
            $files = glob(public_path('pdf/kronologi_pelanggaran_*.pdf'));
            foreach ($files as $file) {
                $fileName = basename($file);
                $zip->addFile($file, $fileName);
            }

            $zip->close();
        } else {
            return response()->json(['error' => 'Could not create ZIP file'], 500);
        }

        @unlink(public_path('pdf/data_punishment.pdf'));
        foreach (glob(public_path('pdf/kronologi_pelanggaran_*.pdf')) as $file) {
            @unlink($file);
        }

        $response = response()->download($zipFileName);
        $response->deleteFileAfterSend(true);

        return $response;
    }

    public function filter(Request $request)
    {
        $angkatan = $request->input('angkatan');
        $siswas = Siswa::where('angkatan', $angkatan)->get();
        return response()->json($siswas);
    }

    public function getSiswaByAngkatan(Request $request)
    {
        $angkatan = $request->angkatan;
        $siswa = Siswa::where('angkatan', $angkatan)
            ->select('id', 'nama')
            ->get();
        return response()->json($siswa);
    }
    public function create()
    {
        $angkatan = Siswa::distinct()->pluck('angkatan');
        return view('database.database.punishment.add', compact('angkatan'));
    }

    public function store(PunishmentRequest $request)
    {
        $validatedData = $request->validated();

        // Handle file upload
        if ($request->hasFile('path_dokumen')) {
            $file = $request->file('path_dokumen');
            $namaFile = Str::random(30) . '.' . $file->getClientOriginalExtension();
            $filePath = '/files/punishment/';
            $file->move(public_path($filePath), $namaFile);
            $validatedData['path_dokumen'] = $filePath . $namaFile;
        }

        // Retrieve the student
        $siswa = Siswa::findOrFail($validatedData['id_siswa']);

        // Calculate new points
        $newPoints = $siswa->point - $validatedData['pengurangan_point'];

        // Update student's points and save
        $siswa->point = $newPoints;
        $siswa->save();

        // Create the punishment record
        Punishment::create($validatedData);

        return redirect()->route('punishment.index')->with('success', 'data punishment berhasil ditambahkan');
    }

    public function edit($id)
    {
        $punishment = Punishment::findOrFail($id);
        $angkatan = Siswa::select('angkatan')->distinct()->pluck('angkatan'); // Ambil daftar angkatan yang unik
        return view('database.database.punishment.edit', compact('punishment', 'angkatan'));
    }
    public function update(PunishmentRequest $request, $id)
    {
        $validatedData = $request->validated();

        $punishment = Punishment::findOrFail($id);
        $siswa = Siswa::findOrFail($punishment->id_siswa);

        $siswa->point += $punishment->pengurangan_point;
        $siswa->point -= $validatedData['pengurangan_point'];
        $siswa->save();

        // Handle file upload
        if ($request->hasFile('path_dokumen')) {
            // Hapus file lama jika ada
            if ($punishment->path_dokumen && file_exists(public_path($punishment->path_dokumen))) {
                unlink(public_path($punishment->path_dokumen));
            }

            $file = $request->file('path_dokumen');
            $namaFile = Str::random(30) . '.' . $file->getClientOriginalExtension();
            $filePath = '/files/punishment/';
            $file->move(public_path($filePath), $namaFile);
            $validatedData['path_dokumen'] = $filePath . $namaFile;
        } else {
            $validatedData['path_dokumen'] = $punishment->path_dokumen;
        }

        $punishment->update($validatedData);
        return redirect()->route('punishment.index')->with('success', 'data punishment berhasil di update');
    }
    public function destroy($id)
    {
        $punishment = Punishment::findOrFail($id);

        $siswa = Siswa::findOrFail($punishment->id_siswa);
        $siswa->point += $punishment->pengurangan_point;
        $siswa->save();

        $punishment->delete();
        return redirect()->route('punishment.index')->with('success', 'data punishment berhasil dihapus');
    }
}
