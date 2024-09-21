<?php

namespace App\Models\keasramaan;

use App\Models\database\Siswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class sertifikat extends Model
{
    use HasFactory;
    protected $table = 'sertifikat_progres';
    protected $fillable = [
        'tanggal',
        'kelas',
        'nama',
        'nisn',
        'juz_30',
        'juz_29',
        'juz_28',
        'juz_umum',
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
