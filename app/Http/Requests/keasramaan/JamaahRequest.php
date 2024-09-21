<?php

namespace App\Http\Requests\keasramaan;

use Illuminate\Foundation\Http\FormRequest;

class JamaahRequest extends FormRequest
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
            'status' => 'required|array',
            'status.*' => 'in:-,Hadir,Sakit,Alpha',
            'nama_siswa' => 'required|array',
            'nama_siswa.*' => 'string|max:75',
            'sholat' => 'required|string|in:subuh,dzuhur,ashar,maghrib,isya',
            'path_dokumentasi' => 'file|max:2048',
        ];
    }
}
