<?php

namespace App\Http\Requests\database;

use Illuminate\Foundation\Http\FormRequest;

class GuruRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'required',
            'no_nik' => 'required',
            'no_gtk' => 'required',
            'no_nuptk' => 'required',
            'tempat_tanggal_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'nama_lulusan_pt' => 'required',
            'nama_jurusan_pt' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'mapel' => 'required',
            'gelar' => 'required',
            'email' => 'required',
            'no_rekening' => 'required',
            'status_kepegawaian' => 'required',
            'tanggal_masuk' => 'required',
            'foto' => 'file|max:2048',
            'foto_ktp' => 'file|max:2048',
            'foto_surat_keterangan_mengajar' => 'file|max:2048',
            'ijazah_smp' => 'file|max:2048',
            'ijazah_sma' => 'file|max:2048',
            'ijazah_s1' => 'file|max:2048',
            'ijazah_s2' => 'file|max:2048',
            'ijazah_s3' => 'file|max:2048',
            'foto_sertifikat.*' => 'file|max:2048',
        ];
    }
}
