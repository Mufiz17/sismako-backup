<?php

namespace App\Http\Requests\sarpras;

use Illuminate\Foundation\Http\FormRequest;

class DormPurchaseRequest extends FormRequest
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
            "tanggal_pembelian" => "required",
            "nama_barang" => "required",
            "kode" => "required|unique:dorm_purchases,kode",
            "harga_satuan" => "required",
            "jumlah_baik" => "required",
            "total_harga" => "required",
            "pembeli" => "required",
            "toko" => "required",
            "deskripsi" => "required",
            "gambar.*" => "required|mimes:jpg,jpeg,png",
        ];
    }

    public function messages()
    {
        return [
            "tanggal_pembelian.required" => "Tanggal Pembelian harus diisi",
            "nama_barang.required" => "Nama Barang harus diisi",
            "kode.required" => "Kode harus diisi",
            "kode.unique" => "Kode sudah digunakan",
            "harga_satuan.required" => "Harga Satuan harus diisi",
            "jumlah_baik.required" => "Jumlah harus diisi",
            "total_harga.required" => "Total Harga harus diisi",
            "pembeli.required" => "Pembeli harus diisi",
            "toko.required" => "Toko harus diisi",
            "deskripsi.required" => "Deskripsi harus diisi",
            "gambar.required" => "Upload gambar",
            "gambar.mimes" => "Gambar harus berupa file dengan format: jpg, jpeg, png",
        ];
    }
}
