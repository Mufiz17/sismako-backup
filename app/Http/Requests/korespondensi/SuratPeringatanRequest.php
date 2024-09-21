<?php

namespace App\Http\Requests\korespondensi;

use Illuminate\Foundation\Http\FormRequest;

class SuratPeringatanRequest extends FormRequest
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
            'subjek' => 'required',
            'no_surat' => 'required',
            'alasan' => 'required',
            'sp' => 'required',
            'keterangan' => 'nullable',
            'file_surat' => 'required|mimes:pdf|file',
            'siswa' => 'nullable',
            'guru' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'tp.required'=> 'Kolom ini wajib diisi',
            'tanggal.required'=> 'Kolom ini wajib diisi',
            'subjek.required'=> 'Kolom ini wajib diisi',
            'no_surat.required'=> 'Kolom ini wajib diisi',
            'alasan.required'=> 'Kolom ini wajib diisi',
            'sp.required'=> 'Kolom ini wajib diisi',
            'file_surat.required'=> 'Wajib upload file',
        ];
    }
}
