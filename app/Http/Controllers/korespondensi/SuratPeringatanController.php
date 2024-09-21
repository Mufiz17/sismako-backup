<?php

namespace App\Http\Controllers\korespondensi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\korespondensi\SuratPeringatan;
use App\Http\Requests\korespondensi\SuratPeringatanRequest;

class SuratPeringatanController extends Controller
{
        /**
     * Display a listing of the resource.
     */


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SuratPeringatanRequest $request)
    {
        // dd($request->all());
        $validated = $request->validated();
        $validated['file_surat'] = $request->file('file_surat')->store('surat-peringatan');

        SuratPeringatan::create($validated);
        return redirect()->route('inbox.index')->with('success', 'Data surat peringatan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
        public function update(SuratPeringatanRequest $request, $id)
    {
        $validated = $request->validated();

        $suratPeringatan = SuratPeringatan::findOrFail($id);

        if ($request->hasFile('file_surat')) {
            // Hapus file lama jika ada
            if ($suratPeringatan->file_surat) {
                Storage::disk('public')->delete($suratPeringatan->file_surat);
            }
            // Simpan file baru
            $validated['file_surat'] = $request->file('file_surat')->store('surat-peringatan');
        }

        $suratPeringatan->update($validated);

        return redirect()->route('inbox.index')->with('success', 'Data surat peringatan berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SuratPeringatan::findOrFail($id)->delete();
        return redirect()->route('inbox.index')->with('success', 'Data surat peringatan berhasil dihapus');
    }
}
