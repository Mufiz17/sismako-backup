<?php

namespace App\Models\keasramaan;
use App\Models\keasramaan\JamaahSiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DokumentasiJamaahSiswa extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'dokumentasi_jamaah_siswa';

    // Kolom yang dapat diisi
    protected $fillable = [
        'kelas',
        'tanggal',
        'sholat',
        'path_dokumentasi',
    ];

    // Relasi dengan model JamaahSiswa
    public function jamaahSiswa()
    {
        return $this->hasMany(JamaahSiswa::class, 'dokumentasi_jamaah');
    }
}
