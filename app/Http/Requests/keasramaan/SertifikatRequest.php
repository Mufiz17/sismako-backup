<?php

namespace App\Http\Requests\keasramaan;

use Illuminate\Foundation\Http\FormRequest;

class SertifikatRequest extends FormRequest
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
            'tanggal' => 'required',
            'siswa_id' => 'required',
            'juz_30' => 'file|max:10240',
            'juz_29' => 'file|max:10240',
            'juz_28' => 'file|max:10240',
            'juz_umum' => 'file|max:10240',
        ];
    }

    public function messages() {
        return [
            'tanggal.required' => 'Tahun ajaran harus diisi',
            'siswa_id.required' => 'NISN wajib diisi',
        ];
    }
}
