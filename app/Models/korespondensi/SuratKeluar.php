<?php

namespace App\Models\korespondensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{

    use HasFactory;
    protected $table = 'surat_keluar';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tp',
        'tanggal',
        'no_surat',
        'jenis_surat',
        'perihal',
        'kepada',
        'file_surat',
        'start_date',
        'end_date'
    ];

    protected $dates = ['tanggal'];
}
