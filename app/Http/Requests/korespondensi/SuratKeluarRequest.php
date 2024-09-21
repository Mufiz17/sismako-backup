<?php

namespace App\Http\Requests\korespondensi;

use Illuminate\Foundation\Http\FormRequest;

class SuratKeluarRequest extends FormRequest
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
            'tp' => 'required',
            'tanggal' => 'required|date',
            'no_surat' => 'required',
            'jenis_surat' => 'required',
            'perihal' => 'required',
            'kepada' => 'required',
            'file_surat' => 'required|mimes:pdf|file'
        ];
    }

    public function messages(): array
    {
        return [
            'tp.required'=> 'Kolom ini wajib diisi',
            'tanggal.required'=> 'Kolom ini wajib diisi',
            'no_surat.required'=> 'Kolom ini wajib diisi',
            'jenis_surat.required'=> 'Kolom ini wajib diisi',
            'perihal.required'=> 'Kolom ini wajib diisi',
            'kepada.required'=> 'Kolom ini wajib diisi',
            'file_surat.required'=> 'Wajib upload file',
        ];
    }
}
