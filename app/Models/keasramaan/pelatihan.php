<?php

namespace App\Models\keasramaan;

use App\Models\database\Siswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pelatihan extends Model
{
    use HasFactory;

    protected $table = 'pelatihan';

    protected $fillable = [
        'tanggal',
        'siswa_id',
        'kegiatan',
        'keterangan',
        'undangan',
        'dokumentasi',
        'type',
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
