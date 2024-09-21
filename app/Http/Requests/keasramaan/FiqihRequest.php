<?php

namespace App\Http\Requests\keasramaan;

use Illuminate\Foundation\Http\FormRequest;

class FiqihRequest extends FormRequest
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
            'materi' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'tanggal.required' => 'Tanggal Fiqih harus diisi',
            'siswa_id.required' => 'Siswa harus dipilih',
            'materi.required' => 'Materi Fiqih harus diisi',
        ];
    }
}
