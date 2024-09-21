<?php

namespace App\Http\Controllers\keasramaan;

use Illuminate\Http\Request;
use App\Models\database\Siswa;
use App\Models\keasramaan\tahfidz;
use App\Http\Controllers\Controller;
use App\Http\Requests\keasramaan\TahfidzRequest;

class tahfidzController extends Controller
{
    public function index()
    {
        $tahfidz = tahfidz::with(['siswa:id,nama,nisn'])->get();;
        return view('keasramaan.quran.tahfidz.tahfidz', compact('tahfidz'));
    }

    public function create(Request $request)
    {
        $mutasiFilter = $request->query('angkatan', ''); // Default empty filter

        // Fetch distinct angkatan values from Siswa model
        $angkatan = Siswa::distinct()->pluck('angkatan');

        // Get the selected angkatan from the request or default to an empty string
        $defaultAngkatan = $request->angkatan;

        // Fetch names for the selected angkatan if available
        $names = $defaultAngkatan ? Siswa::where('angkatan', $defaultAngkatan)->get(['id', 'nama', 'angkatan']) : collect();
        return view('keasramaan.quran.tahfidz.create', compact('angkatan', 'names'));
    }

    public function store(TahfidzRequest $request)
    {
        $validatedData = $request->validated();

        tahfidz::create($validatedData);

        return redirect("/sekolah-keasramaan/al-quran/tahfidz")->with("success", "Berhasil disimpan");
    }

    public function edit($id)
    {
        $tahfidz = tahfidz::find($id);
        return view('keasramaan.quran.tahfidz.edit', compact('tahfidz'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required',
            'surat' => 'required',
            'ayat' => 'required',
            'predikat' => 'required',
            'pengajar' => 'required',
        ], [
            'tanggal.required' => 'Tahun ajaran harus diisi',
            'surat.required' => 'Surat harus diisi',
            'ayat.required' => 'Ayat harus diisi',
            'predikat.required' => 'Predikat harus diisi',
            'pengajar.required' => 'Pengajar harus diisi',
        ]);

        tahfidz::find($id)->update($validatedData);

        return redirect("/sekolah-keasramaan/al-quran/tahfidz")->with("success", "Berhasil diPerbaharui");
    }

    public function destroy($id)
    {
        tahfidz::findOrFail($id)->delete();
        return redirect("/sekolah-keasramaan/al-quran/tahfidz")->with("success", "Berhasil dihapus");
    }
}
