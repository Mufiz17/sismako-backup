<?php

namespace App\Models\database;
use App\Models\database\Siswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RapotSiswa extends Model
{
    use HasFactory;

    // Define the table name if it's different from the plural form of the class name
    protected $table = 'rapot_siswa';

    // Define the primary key if it's different from 'id'
    protected $primaryKey = 'id';

    // If the primary key is not an incrementing integer, set the incrementing property to false
    public $incrementing = true;

    // Define the data type of the primary key if it's different from int
    // protected $keyType = 'bigint';

    // Define the fields that are mass assignable
    protected $fillable = [
        'id_siswa',
        'rapot_kelas',
        'path_file',
    ];

    // Define the relationship with Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id');
    }
}
