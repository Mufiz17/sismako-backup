<?php

namespace App\Http\Controllers\keasramaan;

use App\Http\Controllers\Controller;
use App\Http\Requests\keasramaan\AkhlakRequest;
use Illuminate\Http\Request;
use App\Models\database\Siswa;
use App\Models\keasramaan\akhlak;

class akhlakController extends Controller
{
    public function index()
    {
        $akhlak = akhlak::where('type', 'akhlak')
        ->with([
            'siswa:id,nama,nisn',
            'siswa.dataKelas:id,id_siswa,kelas' // 'id_siswa' is the correct foreign key
        ])
        ->get();


        return view('keasramaan.jurnal.akhlak.akhlak', compact('akhlak'));
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
        return view('keasramaan.jurnal.akhlak.create', compact('angkatan', 'names'));
    }

    public function store(AkhlakRequest $request)
    {
        $validateData = $request->validated();
        akhlak::create(array_merge($validateData, ['type' => 'akhlak']));
        return redirect("/sekolah-keasramaan/jurnal-asrama/akhlak")->with("success", "Berhasil disimpan");
    }

    public function edit($id)
    {
        $akhlak = akhlak::find($id);
        return view('keasramaan.jurnal.akhlak.edit', compact('akhlak'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required',
            'materi' => 'required',
        ], [
            'tanggal.required' => 'Tahun ajaran harus diisi',
            'materi.required' => 'Materi harus diisi',
        ]);

        akhlak::find($id)->update($validatedData);

        return redirect("/sekolah-keasramaan/jurnal-asrama/akhlak")->with("success", "Berhasil diPerbaharui");
    }

    public function destroy($id)
    {
        akhlak::findOrFail($id)->delete();
        return redirect("/sekolah-keasramaan/jurnal-asrama/akhlak")->with("success", "Berhasil dihapus");
    }
}
