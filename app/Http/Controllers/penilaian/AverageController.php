<?php

namespace App\Http\Controllers\penilaian;

use Illuminate\Http\Request;
use App\Models\penilaian\average;
use App\Http\Controllers\Controller;
use App\Http\Requests\penilaian\AverageRequest;

class AverageController extends Controller
{
    public function index()
    {
        $averages = average::all();

        // Calculate averages for each record
        $chartData = [];
        foreach ($averages as $average) {
            $average->totalAverage = $average->calculateAverage();
            $chartData[] = [
                'tahun_ajaran' => $average->tahun_ajaran,
                'kelas' => $average->kelas,
                'semester' => $average->semester,
                'average' => $average->totalAverage,
            ];
        }

        return view('penilaian.rapor.rerata.rerata', compact('averages', 'chartData'));
    }
    public function create()
    {
        return view('penilaian.rapor.rerata.create');
    }
    public function store(AverageRequest $request)
    {
        $ValidatedData = $request->validated();

        average::create($ValidatedData);
        return redirect("/penilaian/rapor/rerata")->with("success", "Berhasil ditambahkan");
    }

    public function edit($id)
    {
        $average = average::find($id);
        return view('penilaian.rapor.rerata.edit', compact('average'));
    }

    public function update(AverageRequest $request, $id)
    {
        $ValidatedData = $request->validated();

        average::find($id)->update($ValidatedData);

        return redirect("/penilaian/rapor/rerata")->with("success", "Berhasil diPerbaharui");
    }
    public function destroy($id)
    {
        average::findOrFail($id)->delete();
        return redirect("/penilaian/rapor/rerata")->with("success", "Berhasil dihapus");
    }
}
