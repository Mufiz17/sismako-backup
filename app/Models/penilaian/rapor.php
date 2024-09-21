<?php

namespace App\Models\penilaian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rapor extends Model
{
    use HasFactory;
    protected $table = 'rapor';
    protected $fillable = [
        'tahun_ajaran',
        'kelas',
        'nama',
        'nisn',
        'semester',
        'released',
        'wname',
        'nip',
        'hmaster',
        'hmnip',
        'attitude',
        'extracurricular',
        'izin',
        'sakit',
        'alpha',
        'achievements',
        'note',
        'muatan_nasional',
        'muatan_kewilayahan',
        'muatan_peminatan',
    ];

    protected $casts = [
        'attitude' => 'array',
        'extracurricular' => 'array',
        'achievements' => 'array',
        'muatan_nasional' => 'array',
        'muatan_kewilayahan' => 'array',
        'muatan_peminatan' => 'array',
    ];
}
