<?php

namespace App\Http\Controllers\korespondensi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\korespondensi\NomorSurat;
use App\Http\Requests\korespondensi\NomorSuratRequest;

class NomorSuratController extends Controller
{
    public function index()
    {
        // Menampilkan daftar nomor surat
        $nomorSurats = NomorSurat::all();
        return view('nomor_surat.index', compact('nomorSurats'));
    }

    public function create()
    {
        // Menampilkan form untuk membuat nomor surat baru
        return view('nomor_surat.create');
    }

    public function store(NomorSuratRequest $request)
    {
        $validated = $request->validated();

        $validated['file_surat'] = $request->file('file_surat')->store('nomor-surat');

        NomorSurat::create($validated);
        return redirect()->route('inbox.index')->with('success', 'Data nomor surat berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        // Menampilkan form untuk mengedit nomor surat
        $nomorSurat = NomorSurat::findOrFail($id);
        return view('nomor_surat.edit', compact('nomorSurat'));
    }

    public function update(NomorSuratRequest $request, $id)
    {
        $validated = $request->validated();

        $nomorSurat = NomorSurat::findOrFail($id);

        if ($request->hasFile('file_surat')) {
            if ($nomorSurat->file_surat) {
                Storage::delete($nomorSurat->file_surat);
            }
            $validated['file_surat'] = $request->file('file_surat')->store('nomor-surat');
        }

        $nomorSurat->update($validated);

        return redirect()->route('inbox.index')->with('success', 'Data nomor surat berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $nomorSurat = NomorSurat::findOrFail($id);

        if ($nomorSurat->file_surat) {
            Storage::delete($nomorSurat->file_surat);
        }

        $nomorSurat->delete();

        return redirect()->route('inbox.index')->with('success', 'Data nomor surat berhasil dihapus');
    }
}

