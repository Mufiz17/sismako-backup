<?php

namespace App\Http\Controllers\penilaian;

use ZipArchive;
use App\Models\penilaian\pas;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\penilaian\PasRequest;

class PasController extends Controller
{
    public function index()
    {
        $pas = pas::where('type', 'pas')->get();
        return view('penilaian.exam.pas.pas', compact('pas'));
    }

    public function create()
    {
        return view('penilaian.exam.pas.create');
    }

    public function store(PasRequest $request)
    {
        $validateData = $request->validated();

        // Menyimpan file-file yang di-upload dengan nama asli
        $fileFields = [
            'kisi_kisi',
            'soal',
            'jawaban',
            'kehadiran',
            'daftar_nilai',
        ];

        foreach ($fileFields as $fileField) {
            if ($request->hasFile($fileField)) {
                $file = $request->file($fileField);
                $originalName = $file->getClientOriginalName();
                // Simpan di public/storage/{fileField}/{originalName}
                $validateData[$fileField] = $file->storeAs($fileField, $originalName, 'public');
            }
        }

        pas::create(array_merge($validateData, ['type' => 'pas']));
        return redirect('/penilaian/pas')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pas = pas::find($id);
        return view('penilaian.exam.pas.edit', compact('pas'));
    }

    public function update(PasRequest $request, $id)
    {
        $validateData = $request->validated();
        $pas = pas::findOrFail($id);

        $fileFields = [
            'kisi_kisi',
            'soal',
            'jawaban',
            'kehadiran',
            'daftar_nilai',
        ];

        foreach ($fileFields as $fileField) {
            if ($request->hasFile($fileField)) {
                // Hapus file lama jika ada
                if ($pas->$fileField) {
                    // Hapus file dari storage/public
                    Storage::disk('public')->delete($pas->$fileField);
                }
                // Simpan file baru
                $file = $request->file($fileField);
                $originalName = $file->getClientOriginalName();
                $validateData[$fileField] = $file->storeAs($fileField, $originalName, 'public');
            } else {
                // Set the field to the old value if no file was uploaded
                $validateData[$fileField] = $pas->$fileField;
            }
        }

        $pas->update($validateData);

        return redirect('/penilaian/pas')->with('success', 'Data berhasil diperbaharui');
    }

    public function destroy($id)
    {
        // Menemukan data dengan ID yang diberikan
        $pas = pas::findOrFail($id);

        // Memeriksa apakah data memiliki type 'pas'
        if ($pas->type !== 'pas') {
            return redirect('/penilaian/pas')->with('error', 'Data tidak dapat dihapus karena type tidak sesuai.');
        }

        $fileFields = [
            'kisi_kisi',
            'soal',
            'jawaban',
            'proker',
            'kehadiran',
            'ba',
            'sk_panitia',
            'tatib',
            'surat_pemberitahuan',
            'jadwal',
            'daftar_nilai',
            'tanda_terima_dan_penerimaan_soal',
            'kehadiran_panitia'
        ];

        foreach ($fileFields as $fileField) {
            if ($pas->$fileField) {
                $filePath = $pas->$fileField;

                if (Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                }
            }
        }

        // Menghapus entri dari database
        $pas->delete();

        return redirect('/penilaian/pas')->with('success', 'Data berhasil dihapus');
    }

    public function download($id)
    {
        $pas = pas::findOrFail($id);

        $directories = [
            'kisi_kisi',
            'soal',
            'jawaban',
            'proker',
            'kehadiran',
            'ba',
            'sk_panitia',
            'tatib',
            'surat_pemberitahuan',
            'jadwal',
            'daftar_nilai',
            'tanda_terima_dan_penerimaan_soal',
            'kehadiran_panitia'
        ];

        // Create a temporary file to store the zip
        $zipFileName = 'pas_files_' . $pas->mapel . '.zip';
        $zipFilePath = storage_path('app/temp/' . $zipFileName);

        // Ensure the temp directory exists
        if (!Storage::exists('temp')) {
            Storage::makeDirectory('temp');
        }

        // Initialize zip archive
        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($directories as $dir) {
                if ($pas->$dir) {
                    $dirPath = public_path('storage/' . $pas->$dir);
                    if (is_dir($dirPath)) {
                        $this->addDirectoryToZip($zip, $dirPath, $dir);
                    } elseif (is_file($dirPath)) {
                        $zip->addFile($dirPath, $dir . '/' . basename($dirPath));
                    }
                }
            }
            $zip->close();

            // Download the created zip file
            return response()->download($zipFilePath)->deleteFileAfterSend(true);
        } else {
            return back()->with('error', 'Failed to create zip file');
        }
    }

    private function addDirectoryToZip($zip, $dirPath, $zipPath)
    {
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($dirPath),
            RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $name => $file) {
            if (!$file->isDir()) {
                // Get the relative path for the zip file
                $filePath = $file->getRealPath();
                $relativePath = $zipPath . '/' . substr($filePath, strlen($dirPath) + 1);

                // Add file to the zip
                $zip->addFile($filePath, $relativePath);
            }
        }
    }
}
