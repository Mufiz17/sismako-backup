<?php

namespace App\Models\database;
use App\Models\database\Siswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataKelulusan extends Model
{
    use HasFactory;

    protected $table = 'data_kelulusan';

    protected $fillable = [
        'tahun_pelajaran',
        'id_siswa',
        'jurusan',
        'tanggal_kelulusan',
        'angkatan',
        'karir_selanjutnya',
        'no_hp',
        'email',
        'path_foto',
    ];

    protected $dates = [
        'tanggal_kelulusan'
    ];
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa'); // Ensure 'id_siswa' matches the column name
    }
}
