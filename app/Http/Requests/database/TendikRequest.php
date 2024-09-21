<?php

namespace App\Http\Requests\database;

use Illuminate\Foundation\Http\FormRequest;

class TendikRequest extends FormRequest
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
            'nama' => 'required|string|max:255',
            'no_nik' => 'required|integer',
            'no_gtk' => 'required|integer',
            'no_nuptk' => 'required|integer',
            'tempat_tanggal_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|max:10',
            'agama' => 'required|string|max:50',
            'alamat' => 'required|string|max:255',
            'status_kepegawaian' => 'required|string|max:50',
            'no_rekening' => 'required',
            'posisi' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pendidikan_terakhir' => 'required|string|max:50',
            'tanggal_masuk' => 'required|date',
            'no_hp' => 'nullable|string',
            'foto' => 'file|max:2048',
            'foto_ktp' => 'file|max:2048',
            'foto_surat_keterangan_mengajar' => 'file|max:2048',
            'ijazah_smp' => 'file|max:2048',
            'ijazah_sma' => 'file|max:2048',
        ];
    }
}
