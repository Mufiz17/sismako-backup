<?php

namespace App\Http\Controllers\korespondensi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\korespondensi\SuratPengajuan;
use App\Http\Requests\korespondensi\SuratPengajuanRequest;

class SuratPengajuanController extends Controller
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
    public function store(SuratPengajuanRequest $request)
    {
        // dd($request->all());
        $validated = $request->validated();

        $validated['file_surat'] = $request->file('file_surat')->store('surat-pengajuan');

        SuratPengajuan::create($validated);
        return redirect()->route('inbox.index')->with('success', 'Data surat pengajuan berhasil ditambahkan');
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

    /**
     * Update the specified resource in storage.
     */
    public function update(SuratPengajuanRequest $request, $id)
    {
        $validated = $request->validated();

        $suratPengajuan = SuratPengajuan::findOrFail($id);

        if ($request->hasFile('file_surat')) {
            $validated['file_surat'] = $request->file('file_surat')->store('surat-pengajuan');
        }

        $suratPengajuan->update($validated);
        return redirect()->route('inbox.index')->with('success', 'Data surat pengajuan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SuratPengajuan::findOrFail($id)->delete();
        return redirect()->route('inbox.index')->with('success', 'Data surat pengajuan berhasil dihapus');
    }
}
