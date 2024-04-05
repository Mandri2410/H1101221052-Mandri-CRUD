<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Tentukan apakah pengguna memiliki izin untuk membuat request ini
        return true; // Ubah ke false jika Anda memiliki logika otentikasi tertentu
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // Atur aturan validasi untuk setiap field yang ingin Anda validasi
        return [
            'name' => 'required|string|max:255', // Contoh aturan validasi untuk field 'name'
            // Tambahkan aturan validasi lainnya sesuai kebutuhan
        ];
    }
}
