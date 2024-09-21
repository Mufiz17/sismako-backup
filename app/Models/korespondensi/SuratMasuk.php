<?php

namespace App\Models\korespondensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $table = 'surat_masuk';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tp',
        'tanggal',
        'no_surat',
        'jenis_surat',
        'perihal',
        'dari',
        'file_surat',
        'start_date',
        'end_date'
    ];

    protected $dates = ['tanggal'];
}
