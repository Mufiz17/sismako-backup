<?php

namespace App\Models\keasramaan;

use App\Models\database\Siswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tahfidz extends Model
{
    use HasFactory;
    protected $table = 'tahfidz';
    protected $fillable = [
        'tanggal',
        'kelas',
        'nama',
        'nisn',
        'surat',
        'ayat',
        'predikat',
        'pengajar',
        'siswa_id'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function scopeBetweenDates($query, $startDate, $endDate)
    {
        return $query->whereBetween('tanggal', [$startDate, $endDate]);
    }
}
