<?php

namespace App\Models\database;
use App\Models\database\Siswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Punishment extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'punishment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'angkatan',
        'tanggal',
        'id_siswa',
        'jenis_pelanggaran',
        'kronologi',
        'pengawasan_guru',
        'pengurangan_point',
        'path_dokumen',
        'tindak_lanjut'
    ];

    protected $dates = ['tanggal'];

    /**
     * Get the siswa that owns the punishment.
     */
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }
}
