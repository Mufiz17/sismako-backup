<?php

namespace App\Http\Controllers\penilaian;

use App\Models\penilaian\rapor;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Http\Requests\penilaian\RaporRequest;

class RaporController extends Controller
{
    public function index()
    {
        $rapor = rapor::get();
        return view('penilaian.rapor.rapor', compact('rapor'));
    }

    public function create()
    {
        return view('penilaian.rapor.create');
    }

    public function store(RaporRequest $request)
    {
        $data = $request->validated();

        rapor::create($data);

        return redirect("/penilaian/rapor")->with("success", "Berhasil disimpan");
    }

    public function edit($id)
    {
        $rapor = rapor::findOrFail($id);
        return view('penilaian.rapor.edit', compact('rapor'));
    }

    public function update(RaporRequest $request, $id)
    {
        $rapor = Rapor::findOrFail($id);
        $data = $request->validated();

        // Save the updated rapor
        $rapor->update($data);

        return redirect("/penilaian/rapor")->with("success", "Berhasil diperbarui");
    }


    public function destroy($id)
    {
        rapor::findOrFail($id)->delete();
        return redirect("/penilaian/rapor")->with("success", "Berhasil dihapus");
    }

    public function pdf($id)
    {
        $rapor = rapor::findOrFail($id);
        $pdf = Pdf::loadView('penilaian.rapor.merdeka', compact('rapor'));
        return $pdf->stream('rapor.pdf');
    }
}
