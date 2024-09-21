<?php

namespace App\Http\Controllers\database;

use App\Models\database\Guru;
use App\Models\database\Siswa;
use App\Models\database\Tendik;
use App\Http\Controllers\Controller;
use App\Models\database\DataKelulusan;

class DatabaseDashboard extends Controller
{
    //
    public function index()
    {
        $totalGuruAktif = Guru::where('status_kepegawaian', 'aktif')->count();
        $totalGuruTidakAktif = Guru::where('status_kepegawaian', 'tidak aktif')->count();

        $totalSiswaAktif = Siswa::where('status_siswa', 'Aktif')->count();
        $totalSiswaTidakAktif = Siswa::where('status_siswa', 'Tidak aktif')->count();

        $totalTendikAktif = Tendik::where('status_kepegawaian', 'aktif')->count();
        $totalTendikTidakAktif = Tendik::where('status_kepegawaian', 'tidak aktif')->count();

        $totalKelulusanSiswa = DataKelulusan::count();
        return view(
            'home.dashboard',
            compact(
                'totalGuruAktif',
                'totalGuruTidakAktif',
                'totalSiswaAktif',
                'totalSiswaTidakAktif',
                'totalKelulusanSiswa',
                'totalTendikAktif',
                'totalTendikTidakAktif'
            )
        );
    }
}
