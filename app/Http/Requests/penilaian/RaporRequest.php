<?php

namespace App\Http\Requests\penilaian;

use Illuminate\Foundation\Http\FormRequest;

class RaporRequest extends FormRequest
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
            'tahun_ajaran' => 'required|string|max:9',
            'kelas' => 'required|string|max:10',
            'nama' => 'required|string|max:100',
            'nisn' => 'required|string|max:10',
            'semester' => 'required|string',
            'released' => 'nullable|date',
            'wname' => 'nullable|string|max:100',
            'nip' => 'nullable|string|max:18',
            'hmaster' => 'nullable|string|max:100',
            'hmnip' => 'nullable|string|max:18',
            'attitude' => 'nullable|array',
            'extracurricular' => 'nullable|array',
            'izin' => 'nullable|integer|min:0',
            'sakit' => 'nullable|integer|min:0',
            'alpha' => 'nullable|integer|min:0',
            'achievements' => 'nullable|array',
            'note' => 'nullable|string',
            'muatan_nasional' => 'nullable|array',
            'muatan_kewilayahan' => 'nullable|array',
            'muatan_peminatan' => 'nullable|array',
        ];
    }
}
