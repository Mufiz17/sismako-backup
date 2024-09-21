<?php

namespace App\Models\penilaian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class average extends Model
{
    use HasFactory;
    protected $table = 'average';
    protected $fillable = [
        'tahun_ajaran',
        'kelas',
        'semester',
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
        'pkk'
    ];

    public function calculateAverage()
    {
        $subjects = [
            $this->pai,
            $this->pkn,
            $this->indo,
            $this->mtk,
            $this->sejindo,
            $this->bhs_asing,
            $this->sbd,
            $this->pjok,
            $this->simdig,
            $this->fis,
            $this->kim,
            $this->sis_kom,
            $this->komjar,
            $this->progdas,
            $this->ddg,
            $this->iaas,
            $this->paas,
            $this->saas,
            $this->siot,
            $this->skj,
            $this->pkk
        ];

        // Filter out null values and count valid scores
        $validSubjects = array_filter($subjects, fn($subject) => $subject !== null);
        $count = count($validSubjects);

        // Calculate average if there are valid scores
        if ($count > 0) {
            return array_sum($validSubjects) / $count;
        }

        return null; // or return a default value if needed
    }
}
