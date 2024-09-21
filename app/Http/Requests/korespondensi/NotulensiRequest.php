<?php

namespace App\Http\Requests\korespondensi;

use Illuminate\Foundation\Http\FormRequest;

class NotulensiRequest extends FormRequest
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
            'waktu' => 'required',
            'daring' => 'required',
            'materi' => 'required',
            'peserta' => 'required',
            'pemateri' => 'required',
            'hasil' => 'required',
            'file_surat' => 'required|file',
            'file_dokumentasi' => 'nullable|mimes:jpg,jpeg,png|file'
        ];
    }

    public function messages(): array
    {
        return [
            'tp.required' => 'Kolom ini wajib diisi',
            'tanggal.required' => 'Kolom ini wajib diisi',
            'waktu.required' => 'Kolom ini wajib diisi',
            'daring.required' => 'Kolom ini wajib diisi',
            'materi.required' => 'Kolom ini wajib diisi',
            'peserta.required' => 'Kolom ini wajib diisi',
            'pemateri.required' => 'Kolom ini wajib diisi',
            'hasil.required' => 'Kolom ini wajib diisi',
            'file_surat.required' => 'Wajib upload file surat',
            'file_surat.mimes' => 'File surat harus berupa PDF',
            'file_dokumentasi.mimes' => 'File dokumentasi harus berupa JPG, JPEG, atau PNG',
        ];
    }
}
