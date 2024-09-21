<?php

namespace App\Models\database;
use App\Models\database\Guru;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SertifikatGuru extends Model
{
    use HasFactory;

    protected $table = 'sertifikat_guru'; // Nama tabel sesuai dengan yang Anda tentukan dalam migration
    protected $fillable = [
        'id_guru', 'nama_file',
    ];

    // Definisi relasi dengan tabel 'guru'
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }
}
