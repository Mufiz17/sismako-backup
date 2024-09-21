<?php

namespace App\Models\keasramaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\database\Siswa;

class tahsin extends Model
{
    use HasFactory;
    protected $table = 'tahsin';
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
