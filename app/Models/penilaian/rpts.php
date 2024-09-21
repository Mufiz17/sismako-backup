<?php

namespace App\Models\penilaian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rpts extends Model
{
    protected $table = 'rpts';
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
        'kehadiran',
        'izin',
        'sakit',
        'alpha',
        'pai',
        'pkn',
        'indo',
        'mtk',
        'sejindo',
        'bhs_asing',
        'sbd',
        'pjok',
        'simdig',
        'fis',
        'kim',
        'sis_kom',
        'komjar',
        'progdas',
        'ddg',
        'iaas',
        'paas',
        'saas',
        'siot',
        'skj',
        'pkk',
    ];
    use HasFactory;
}
