<?php

namespace App\Http\Controllers\database;

use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\database\DataKelas;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\database\DataKelulusan;
use App\Http\Requests\database\KelulusanRequest;


class DataKelulusanController extends Controller
{
    public function getSiswaLulusByAngkatan(Request $request)
    {
        $angkatan = $request->query('angkatan');

        $siswaLulus = DataKelas::get();

        return response()->json($siswaLulus);
    }

    public function index(Request $request)
{
    $tahunPelajaranFilter = $request->query('tahun_pelajaran', ''); // Default empty filter
    $angkatanFilter = $request->query('angkatan', ''); // Default empty filter

    $query = DataKelulusan::query();

    if ($tahunPelajaranFilter) {
        $query->where('tahun_pelajaran', $tahunPelajaranFilter);
    }

    if ($angkatanFilter) {
        $query->where('angkatan', $angkatanFilter);
    }

    $dataKelulusan = $query->with('siswa')->get();

    // Assuming you have arrays of all possible values for the filters
    $tahunPelajaranList = DataKelulusan::select('tahun_pelajaran')->distinct()->pluck('tahun_pelajaran');
    $angkatanList = DataKelulusan::select('angkatan')->distinct()->pluck('angkatan');

    return view('database.database.kelulusan.index', compact('dataKelulusan', 'tahunPelajaranFilter', 'angkatanFilter', 'tahunPelajaranList', 'angkatanList'));
}

public function create()
{
    $angkatan = DataKelas::distinct()->pluck('angkatan');
    return view('database.database.kelulusan.add', compact('angkatan'));
}

    public function edit($id) {
        $data = DataKelulusan::findOrFail($id);
        $data->tanggal_kelulusan = Carbon::parse($data->tanggal_kelulusan);
        return view('database.database.kelulusan.edit', compact('data'));
    }

    public function store(KelulusanRequest $request)
    {

        // dd($request->all());
        $validatedData = $request->validated();

        // Handle file upload
        if ($request->hasFile('path_foto')) {
            $file = $request->file('path_foto');
            $namaFile = Str::random(30) . '.' . $file->getClientOriginalExtension();
            $filePath = '/files/kelulusan/';
            $file->move(public_path($filePath), $namaFile);
            $validatedData['path_foto'] = $filePath . $namaFile;
        } else {
            return response()->json(['error' => 'File not uploaded'], 400);
        }

         // Merge the id_siswa into the validated data

    DataKelulusan::create($validatedData);

        return redirect()->route('kelulusan.index')->with('success', 'Data berhasil di tambahkan');
    }
    public function update(KelulusanRequest $request, $id)
    {
        $validatedData = $request->validated();
        // Handle file upload
        if ($request->hasFile('path_foto')) {
            $file = $request->file('path_foto');
            $namaFile = Str::random(30) . '.' . $file->getClientOriginalExtension();
            $filePath = '/files/kelulusan/';
            $file->move(public_path($filePath), $namaFile);
            $validatedData['path_foto'] = $filePath . $namaFile;
        } else {
            return response()->json(['error' => 'File not uploaded'], 400);
        }
        $dataKelulusan = DataKelulusan::findOrFail($id);
        $dataKelulusan->update($validatedData,);

        return redirect()->route('kelulusan.index')->with('success', 'Data berhasil di update');
    }

    public function destroy($id)
    {
        $dataKelulusan = DataKelulusan::findOrFail($id);

        $baseDir = public_path($dataKelulusan->path_foto);
        // Hapus direktori dan semua isinya
        if (File::exists($baseDir)) {
            File::delete($baseDir);
        }
        $dataKelulusan->delete();

        return redirect()->route('kelulusan.index')->with('success', 'Data berhasil dihapus');
    }

    public function exportPdfCv($id)
    {
        $data_kelulusan = DataKelulusan::findOrFail($id);

        $html = View::make('database.template.dataKelulusanCv', compact('data_kelulusan'))->render();

        // Instantiate Dompdf
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('isHtml5ParserEnabled', true);

        $dompdf = new Dompdf($options);

        // Load HTML content
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (important step!)
        $dompdf->render();

        return $dompdf->stream($data_kelulusan->nama . '.pdf');
    }

    public function exportPdf(Request $request)
    {
        $tahunPelajaranFilter = $request->query('tahun_pelajaran', ''); // Default empty filter
        $angkatanFilter = $request->query('angkatan', '');

        $query = DataKelulusan::query();

        if ($tahunPelajaranFilter) {
            $query->where('tahun_pelajaran', $tahunPelajaranFilter);
        }

        if ($angkatanFilter) {
            $query->where('angkatan', $angkatanFilter);
        }

        $dataKelulusan = $query->get();

        $html = View::make('database.template.dataKelulusan', compact('dataKelulusan'))->render();

        // Instantiate Dompdf
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('isHtml5ParserEnabled', true);

        $dompdf = new Dompdf($options);

        // Load HTML content
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A3', 'landscape');

        // Render PDF (important step!)
        $dompdf->render();

        return $dompdf->stream('Data Kelulusan.pdf');
    }
}
