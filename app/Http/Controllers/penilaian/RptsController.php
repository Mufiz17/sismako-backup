<?php

namespace App\Http\Controllers\penilaian;
use App\Models\penilaian\rpts;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Http\Requests\penilaian\RptsRequest;

class RptsController extends Controller
{
    public function index()
    {
        $rpts = rpts::get();
        return view('penilaian.rapor.pts.rapor', compact('rpts'));
    }

    public function create()
    {
        return view('penilaian.rapor.pts.create');
    }

    public function store(RptsRequest $request)
    {
        rpts::create($request->validated());
        return redirect("/penilaian/rpts")->with("success", "Berhasil disimpan");
    }

    public function edit($id)
    {
        $rpts = rpts::find($id);
        return view('penilaian.rapor.pts.edit', compact('rpts'));
    }

    public function update(RptsRequest $request, $id)
    {
        rpts::find($id)->update($request->validated());
        return redirect("/penilaian/rpts")->with("success", "Berhasil diperbaharui");
    }

    public function destroy($id)
    {
        rpts::findOrFail($id)->delete();
        return redirect("/penilaian/rpts")->with("success", "Berhasil dihapus");
    }

    public function pdf($id)
    {
        $rpts = rpts::findOrFail($id);
        $pdf = Pdf::loadView('penilaian.rapor.pts.merdeka', compact('rpts'));
        return $pdf->stream('rpts.pdf');
    }
}
