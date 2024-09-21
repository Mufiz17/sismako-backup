<?php

namespace App\Http\Controllers\korespondensi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\korespondensi\Notulensi;
use App\Models\korespondensi\NomorSurat;
use App\Models\korespondensi\SuratMasuk;
use App\Models\korespondensi\SuratKeluar;
use App\Models\korespondensi\SuratPengajuan;
use App\Models\korespondensi\SuratPeringatan;
use Barryvdh\DomPDF\Facade\Pdf;

class GeneratePdfController extends Controller
{
    public function generatePdf($model, Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');



        $models = [
            'suratmasuk' => [
                'model' => SuratMasuk::class,
                'view' => 'korespondensi.pdf.suratmasukpdf',
                'default_filename' => 'suratmasuk.pdf',
            ],
            'suratkeluar' => [
                'model' => SuratKeluar::class,
                'view' => 'korespondensi.pdf.suratkeluarpdf',
                'default_filename' => 'suratkeluar.pdf',
            ],
            'suratperingatan' => [
                'model' => SuratPeringatan::class,
                'view' => 'korespondensi.pdf.suratperingatanpdf',
                'default_filename' => 'suratperingatan.pdf',
            ],
            'nomorsurat' => [
                'model' => NomorSurat::class,
                'view' => 'korespondensi.pdf.nomorsuratpdf',
                'default_filename' => 'nomorsurat.pdf', 
            ],
            'notulensi' => [
                'model' => Notulensi::class,
                'view' => 'korespondensi.pdf.notulensipdf',
                'default_filename' => 'notulensi.pdf',
            ],
            'suratpengajuan' => [
                'model' => SuratPengajuan::class,
                'view' => 'korespondensi.pdf.suratpengajuanpdf',
                'default_filename' => 'suratpengajuan.pdf',
            ],

        ];

        if (!isset($models[$model])) {
            abort(404, 'Model tidak ditemukan');
        }

    $modelClass = $models[$model]['model'];
    $query = $modelClass::query();

    if ($model === 'suratperingatan' && $request->has('subjek') && !empty($request->subjek)) {
        $query->where('subjek', $request->subjek);
    }

    if ($startDate) {
        $query->where('tanggal', '>=', $startDate);
    }

    if ($endDate) {
        $query->where('tanggal', '<=', $endDate);
    }

    $filteredData = $query->orderBy('tanggal', 'ASC')->limit(1000)->get(); 

    $filename = $request->input('filename', $models[$model]['default_filename']);

    $pdf = Pdf::loadView($models[$model]['view'], ['data' => $filteredData])
              ->setPaper('a4', 'landscape')
              ->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);

    return $pdf->stream($filename);
    }

}
