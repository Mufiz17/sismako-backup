<?php

namespace App\Http\Requests\keasramaan;

use Illuminate\Foundation\Http\FormRequest;

class EventualRequest extends FormRequest
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
            'kegiatan' => 'required',
            'keterangan' => 'required',
            'dokumentasi.' => 'file|max:10240',
            'undangan.' => 'file|max:10240',
        ];
    }
    public function messages()
    {
        return [
            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'kegiatan.required' => 'Nama kegiatan yang dilaksanakan tidak boleh kosong',
            'keterangan.required' => 'Keterangan Tidak boleh kosong',
            'dokumentasi.*.max' => 'Ukuran file yang diupload maksimal 10MB',
            'undangan.*.max' => 'Ukuran file yang diupload maksimal 10MB',
        ];
    }
}
