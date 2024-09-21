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

class indexController extends Controller
{
    public function index(){
        $suratmasuk = SuratMasuk::all();
        $suratkeluar = SuratKeluar::all();
        $suratperingatan = SuratPeringatan::all();
        $nomorsurat = NomorSurat::all();
        $notulensi = Notulensi::all();
        $suratpengajuan= SuratPengajuan::all();

        return view('korespondensi.index', compact('suratmasuk', 'suratkeluar', 'nomorsurat', 'suratperingatan', 'suratpengajuan', 'notulensi'));
    }
}
