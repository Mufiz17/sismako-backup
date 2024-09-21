<?php

namespace App\Http\Controllers\penilaian;

use ZipArchive;
use Illuminate\Http\Request;
use App\Models\penilaian\pas;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\penilaian\PasRequest;

class PanitiaController extends Controller
{
    public function index()
    {
        $panitia = pas::where('type', 'panitia')->get();
        return view('penilaian.exam.panitia.panitia', compact('panitia'));
    }

    public function create()
    {
        return view('penilaian.exam.panitia.create');
    }

    public function store(PasRequest $request)
    {
        $validateData = $request->validated();

        // Menyimpan file-file yang di-upload dengan nama asli
        $fileFields = [
            'jawaban',
            'proker',
            'ba',
            'sk_panitia',
            'tatib',
            'surat_pemberitahuan',
            'jadwal',
            'denah',
            'kehadiran_panitia',
            'tanda_terima_dan_penerimaan_soal',
        ];

        foreach ($fileFields as $fileField) {
            if ($request->hasFile($fileField)) {
                $file = $request->file($fileField);
                $originalName = $file->getClientOriginalName();
                // Simpan di public/storage/{fileField}/{originalName}
                $validateData[$fileField] = $file->storeAs($fileField, $originalName, 'public');
            }
        }

        pas::create(array_merge($validateData, ['type' => 'panitia']));
        return redirect('/penilaian/panitia')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $panitia = pas::find($id);
        return view('penilaian.exam.panitia.edit', compact('panitia'));
    }

    public function update(PasRequest $request, $id)
    {
        $validateData = $request->validated();
        $panitia = pas::findOrFail($id);

        $fileFields = [
            'jawaban',
            'proker',
            'ba',
            'sk_panitia',
            'tatib',
            'surat_pemberitahuan',
            'jadwal',
            'denah',
            'kehadiran_panitia',
            'tanda_terima_dan_penerimaan_soal',
        ];

        foreach ($fileFields as $fileField) {
            if ($request->hasFile($fileField)) {
                // Hapus file lama jika ada
                if ($panitia->$fileField) {
                    // Hapus file dari storage/public
                    Storage::disk('public')->delete($panitia->$fileField);
                }
                // Simpan file baru
                $file = $request->file($fileField);
                $originalName = $file->getClientOriginalName();
                $validateData[$fileField] = $file->storeAs($fileField, $originalName, 'public');
            } else {
                // Set the field to the old value if no file was uploaded
                $validateData[$fileField] = $panitia->$fileField;
            }
        }

        $panitia->update($validateData);

        return redirect('/penilaian/panitia')->with('success', 'Data berhasil diperbaharui');
    }

    public function destroy($id)
    {
        // Menemukan data dengan ID yang diberikan
        $panitia = pas::findOrFail($id);

        // Memeriksa apakah data memiliki type 'pas'
        if ($panitia->type !== 'panitia') {
            return redirect('/penilaian/panitia')->with('error', 'Data tidak dapat dihapus karena type tidak sesuai.');
        }

        $fileFields = [
            'jawaban',
            'proker',
            'ba',
            'sk_panitia',
            'tatib',
            'surat_pemberitahuan',
            'jadwal',
            'denah',
            'kehadiran_panitia',
            'tanda_terima_dan_penerimaan_soal',
        ];

        foreach ($fileFields as $fileField) {
            if ($panitia->$fileField) {
                $filePath = $panitia->$fileField;

                if (Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                }
            }
        }

        // Menghapus entri dari database
        $panitia->delete();

        return redirect('/penilaian/panitia')->with('success', 'Data berhasil dihapus');
    }

    public function download($id)
    {
        $panitia = pas::findOrFail($id);

        $directories = [
            'jawaban',
            'proker',
            'ba',
            'sk_panitia',
            'tatib',
            'surat_pemberitahuan',
            'jadwal',
            'denah',
            'kehadiran_panitia',
            'tanda_terima_dan_penerimaan_soal',
        ];

        // Create a temporary file to store the zip
        $zipFileName = 'panitia_files_' . $panitia->mapel . '.zip';
        $zipFilePath = storage_path('app/temp/' . $zipFileName);

        // Ensure the temp directory exists
        if (!Storage::exists('temp')) {
            Storage::makeDirectory('temp');
        }

        // Initialize zip archive
        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($directories as $dir) {
                if ($panitia->$dir) {
                    $dirPath = public_path('storage/' . $panitia->$dir);
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

