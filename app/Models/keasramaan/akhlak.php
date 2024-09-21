<?php

namespace App\Models\keasramaan;

use App\Models\database\Siswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class akhlak extends Model
{
    use HasFactory;
    protected $table = 'akhlak';
    protected $fillable = [
        'tanggal',
        'kelas',
        'materi',
        'type',
        'nisn',
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
