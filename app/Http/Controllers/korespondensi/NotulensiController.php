<?php

namespace App\Http\Controllers\korespondensi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\korespondensi\Notulensi;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\korespondensi\NotulensiRequest;

class NotulensiController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

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
    public function store(NotulensiRequest $request)
    {
        // dd($request->all());
        $validated = $request->validated();

        $validated['file_surat'] = $request->file('file_surat')->store('notulensi-surat');
        if ($request->hasFile('file_dokumentasi')) {
            $validated['file_dokumentasi'] = $request->file('file_dokumentasi')->store('notulensi-dokumentasi');
        }

        Notulensi::create($validated);
        return redirect()->route('inbox.index')->with('success', 'Data notulensi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function downloadSurat($id)
    {
        $notulensi = Notulensi::findOrFail($id);

        if ($notulensi->file_surat && Storage::exists($notulensi->file_surat)) {
            return Storage::download($notulensi->file_surat);
        }

        return redirect()->route('inbox.index')->with('error', 'File surat tidak ditemukan');
    }

    /**
     * Download the specified file dokumentasi.
     */
    public function downloadDokumentasi($id)
    {
        $notulensi = Notulensi::findOrFail($id);

        if ($notulensi->file_dokumentasi && Storage::exists($notulensi->file_dokumentasi)) {
            return Storage::download($notulensi->file_dokumentasi);
        }

        return redirect()->route('inbox.index')->with('error', 'File dokumentasi tidak ditemukan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NotulensiRequest $request, $id)
    {
        $validated = $request->validated();

        $notulensi = Notulensi::findOrFail($id);

        if ($request->hasFile('file_surat')) {
            if ($notulensi->file_surat) {
                Storage::delete($notulensi->file_surat);
            }
            $validated['file_surat'] = $request->file('file_surat')->store('notulensi-surat');
        }

        if ($request->hasFile('file_dokumentasi')) {
            if ($notulensi->file_dokumentasi) {
                Storage::delete($notulensi->file_dokumentasi);
            }
            $validated['file_dokumentasi'] = $request->file('file_dokumentasi')->store('notulensi-dokumentasi');
        }

        $notulensi->update($validated);

        return redirect()->route('inbox.index')->with('success', 'Data notulensi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Notulensi::findOrFail($id)->delete();
        return redirect()->route('inbox.index')->with('success', 'Data notulensi berhasil dihapus');
    }
}
