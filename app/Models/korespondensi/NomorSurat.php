<?php

namespace App\Models\korespondensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NomorSurat extends Model
{
    use HasFactory;
    protected $table = 'nomor_surat';

    protected $fillable = [
        'tp',
        'tanggal',
        'no_surat',
        'keperluan',
        'file_surat',
        'start_date',
        'end_date'
    ];
    protected $dates = ['tanggal'];
}
