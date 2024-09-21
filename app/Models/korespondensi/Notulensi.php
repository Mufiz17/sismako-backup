<?php

namespace App\Models\korespondensi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notulensi extends Model
{
    use HasFactory;
    protected $table = 'notulensi';

    protected $primarykey = 'id';

    protected $fillable = [
        'tp',
        'tanggal',
        'waktu',
        'daring',
        'materi',
        'peserta',
        'hasil',
        'file_surat',
        'file_dokumentasi',
        'start_date',
        'end_date',
        'pemateri'
    ];

    protected $dates = ['tanggal'];
}
