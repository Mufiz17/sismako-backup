<?php

namespace App\Http\Controllers\database;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use App\Models\database\DataPrestasi;
use App\Http\Controllers\Controller;
use App\Http\Requests\database\prestasiRequest;


class DataPrestasiController extends Controller
{

    public function index(Request $request)
    {
        $statusFilter = $request->query('status', '');
        $query = DataPrestasi::query();

        if ($statusFilter) {
            $query->where('status', $statusFilter);
        }
        $dataPrestasi = $query->get();
        return view('database.database.prestasi.index', compact('dataPrestasi', 'statusFilter'));
    }

    public function exportPdf(Request $request)
    {
        $statusFilter = $request->query('status', '');

        $query = DataPrestasi::query();

        if ($statusFilter) {
            $query->where('status', $statusFilter);
        }

        $dataPrestasi = $query->get();

        $html = View::make('database.template.prestasi', compact('dataPrestasi', 'statusFilter'))->render();

        $options = new \Dompdf\Options();
        $options->set('isRemoteEnabled', true);
        $options->set('isHtml5ParserEnabled', true);

        $dompdf = new \Dompdf\Dompdf($options);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        return $dompdf->stream('data_prestasi.pdf');
    }

    public function create()
    {
        return view('database.database.prestasi.add');
    }

    public function store(prestasiRequest $request)
    {
        // Validate incoming request data
        $validatedData = $request->validated();

        // Handle file upload
        $file = $request->file('path_sertifikat');
        $namaFile =  Str::random(30) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('/files/prestasi/' . $request->status . '/'), $namaFile);

        // Create a new DataPrestasi record with file path
        DataPrestasi::create(array_merge($validatedData, [
            'nama_file' => '/files/prestasi/' . $request->status . '/' . $namaFile,
            'kelas' => $request->kelas
        ]));

        return redirect()->route('prestasi.index')->with('success', 'Data berhasil di tambahkan');
    }

    public function update(prestasiRequest $request, $id)
    {
        // Validate incoming request data
        $validatedData = $request->validated();

        // Find the existing DataPrestasi record by ID
        $data = DataPrestasi::findOrFail($id);

        // Get the uploaded file
        $file = $request->file('path_sertifikat');

        if ($file) {
            $oldNameFile = basename($data->nama_file);
            dd($oldNameFile);
            $newFileName = $file->getClientOriginalName();

            // Check if the new file name is the same as the old one
            if ($oldNameFile !== $newFileName) {
                // Delete the existing file if it's different from the new one
                if (File::exists(public_path($data->nama_file))) {
                    File::delete(public_path($data->nama_file));
                }

                // Generate a unique file name
                $namaFile = Str::random(30) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('/files/prestasi/' . $request->status . '/'), $namaFile);

                // Update the file path in the database
                $validatedData['nama_file'] = '/files/prestasi/' . $request->status . '/' . $namaFile;
            }
        }

        // Update the DataPrestasi record with new data (including the file path if it was updated)
        DataPrestasi::where('id', $id)->update(array_merge($validatedData, [
            'kelas' => $request->kelas
        ]));

        // Optionally, provide feedback or redirect to another page
        return redirect()->route('prestasi.index')->with('success', 'Data berhasil di update');
    }


    public function edit($id)
    {
        $prestasi = DataPrestasi::findOrFail($id);
        return view('database.database.prestasi.edit', compact('prestasi'));
    }

    public function destroy($id)
    {
        $prestasi = DataPrestasi::findOrFail($id);
        if (File::exists(public_path($prestasi->nama_file))) {
            File::delete(public_path($prestasi->nama_file));
        }
        $prestasi->delete();
        return redirect()->route('prestasi.index')->with('success', 'Data berhasil dihapus');
    }
}
