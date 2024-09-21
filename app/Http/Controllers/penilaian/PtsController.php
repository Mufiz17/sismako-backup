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

class PtsController extends Controller
{
    public function index()
    {
        $pts = pas::where('type', 'pts')->get();
        return view('penilaian.exam.pts.pts', compact('pts'));
    }

    public function create()
    {
        return view('penilaian.exam.pts.create');
    }

    public function store(PasRequest $request)
    {
        $validateData = $request->validated();

        // Menyimpan file-file yang di-upload dengan nama asli
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
            if ($request->file($fileField)) {
                $file = $request->file($fileField);
                $originalName = $file->getClientOriginalName();
                // Simpan di public/storage/{fileField}/{originalName}
                $validateData[$fileField] = $file->storeAs($fileField, $originalName, 'public');
            }
        }

        pas::create(array_merge($validateData, ['type' => 'pts']));

        return redirect('/penilaian/pts')->with('success', 'Data berhasil ditambahkan');
    }


    public function edit($id)
    {
        $pts = pas::find($id);
        return view('penilaian.exam.pts.edit', compact('pts'));
    }

    public function update(PasRequest $request, $id)
    {
        $validateData = $request->validated();
        $pts = pas::findOrFail($id);

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
            if ($request->file($fileField)) {
                // Hapus file lama jika ada
                if ($pts->$fileField) {
                    // Hapus file dari storage/public
                    Storage::disk('public')->delete($pts->$fileField);
                }
                // Simpan file baru
                $file = $request->file($fileField);
                $originalName = $file->getClientOriginalName();
                $validateData[$fileField] = $file->storeAs($fileField, $originalName, 'public');
            } else {
                // Set the field to the old value if no file was uploaded
                $validateData[$fileField] = $pts->$fileField;
            }
        }

        $pts->update($validateData);

        return redirect('/penilaian/pts')->with('success', 'Data berhasil diperbaharui');
    }

    public function destroy($id)
    {
        $pts = pas::findOrFail($id);

        $fileFields = [
            'kisi_kisi',
            'soal',
            'jawaban',
            'kehadiran',
            'daftar_nilai',
        ];

        foreach ($fileFields as $fileField) {
            if ($pts->$fileField) {
                $filePath = $pts->$fileField;

                // Hapus file dari public disk
                if (Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                }
            }
        }

        $pts->delete();

        return redirect('/penilaian/pts')->with('success', 'Data berhasil dihapus');
    }


    public function download($id)
    {
        $pts = pas::findOrFail($id);

        $directories = [
            'kisi_kisi',
            'soal',
            'jawaban',
            'kehadiran',
            'daftar_nilai',
        ];

        // Create a temporary file to store the zip
        $zipFileName = 'pts_files_' . $pts->mapel . '.zip';
        $zipFilePath = storage_path('app/temp/' . $zipFileName);

        // Ensure the temp directory exists
        if (!Storage::exists('temp')) {
            Storage::makeDirectory('temp');
        }

        // Initialize zip archive
        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($directories as $dir) {
                if ($pts->$dir) {
                    $dirPath = public_path('storage/' . $pts->$dir);
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
