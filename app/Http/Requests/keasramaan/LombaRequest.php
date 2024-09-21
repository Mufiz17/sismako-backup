<?php

namespace App\Http\Requests\keasramaan;

use Illuminate\Foundation\Http\FormRequest;

class LombaRequest extends FormRequest
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

    public function messages(){
        return [
            'dokumentasi.*.file' => 'Dokumen Dokumentasi harus berformat file (.pdf,.docx,.jpg,.png)',
            'undangan.*.file' => 'Dokumen Undangan harus berformat file (.pdf,.docx,.jpg,.png)',
            'tanggal.required' => 'Tanggal harus diisi',
            'kegiatan.required' => 'Kegiatan harus diisi',
            'keterangan.required' => 'Keterangan harus diisi',
        ];
    }
}
