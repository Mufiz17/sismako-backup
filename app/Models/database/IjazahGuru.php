<?php

namespace App\Models\database;
use App\Models\database\Guru;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IjazahGuru extends Model
{
    use HasFactory;

    protected $table = 'ijazah_guru'; // Nama tabel sesuai dengan yang Anda tentukan dalam migration
    protected $primaryKey = 'id'; // Nama kunci utama pada tabel 'ijazah_guru'
    protected $fillable = [
        'id_guru', 'nama_file',
    ];

    // Definisi relasi dengan tabel 'guru'
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }
}
