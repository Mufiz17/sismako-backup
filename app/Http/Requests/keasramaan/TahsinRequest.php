<?php

namespace App\Http\Requests\keasramaan;

use Illuminate\Foundation\Http\FormRequest;

class TahsinRequest extends FormRequest
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
            'surat' => 'required',
            'ayat' => 'required',
            'predikat' => 'required',
            'pengajar' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'tanggal.required' => 'Tanggal harus diisi.',
            'ayat.required' => 'Ayat harus diisi.',
            'predikat.required' => 'Predikat harus diisi.',
            'pengajar.required' => 'Pengajar harus diisi.',
        ];
    }
}
