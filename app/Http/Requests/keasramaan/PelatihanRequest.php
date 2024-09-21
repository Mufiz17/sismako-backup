<?php

namespace App\Http\Requests\keasramaan;

use Illuminate\Foundation\Http\FormRequest;

class PelatihanRequest extends FormRequest
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
            'kegiatan' => 'required',
            'keterangan' => 'required',
            'dokumentasi.' => 'file|max:10240',
            'undangan.' => 'file|max:10240',
        ];
    }

    public function messages() {
        return [
            'keterangan.required' => 'Keterangan wajib diisi',
            'tanggal.required' => 'Tanggal wajib diisi',
            'dokumentasi.*.max' => 'Maksimal file size adalah 10MB',
            'undangan.*.max' => 'Maksimal file size adalah 10MB',
        ];
    }
}
