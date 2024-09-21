<?php

namespace App\Http\Controllers\korespondensi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\korespondensi\SuratMasuk;
use App\Http\Requests\korespondensi\SuratMasukRequest;

class SuratMasukController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suratMasuk = SuratMasuk::all();
        return view('korespondensi.index', compact('suratMasuk'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(SuratMasukRequest $request)
    {

        // dd($request->all());
        $validated = $request->validated();
        $file = $request->file('file_surat');
        $fileName = $file->getClientOriginalName();
        $validated['file_surat'] = $file->storeAs('surat-masuk', $fileName);


        SuratMasuk::create($validated);
        return redirect()->route('inbox.index')->with('success', 'Data surat masuk berhasil ditambahkan');
    }

    // download
    public function download($id)
    {
        $import = SuratMasuk::findOrFail($id);

        $filePath = public_path('storage/' . $import->file_surat);

        return response()->download($filePath);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);
        return view('inbox.edit', compact('suratMasuk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SuratMasukRequest $request, $id)
    {
                // dd($request->all());
        $validated= $request->validated();

        $suratMasuk = SuratMasuk::findOrFail($id);

        if ($request->hasFile('file_surat')) {
            $file = $request->file('file_surat');
            $fileName = $file->getClientOriginalName();
            $validated['file_surat'] = $file->storeAs('surat-masuk', $fileName);

            // Hapus file lama jika ada
            if ($suratMasuk->file_surat) {
                Storage::disk('public')->delete($suratMasuk->file_surat);
            }
        }

        $suratMasuk->update($validated);

        return redirect()->route('inbox.index')->with('success', 'Data surat masuk berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        SuratMasuk::findOrFail($id)->delete();
        return redirect()->route('inbox.index')->with('success', 'Data surat masuk berhasil dihapus');
    }
}
