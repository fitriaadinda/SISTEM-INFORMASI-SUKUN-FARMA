<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TambahObat extends FormRequest
{
    public function rules()
    {
        return [
            'kode_obat' => 'bail|required|max:100',
            'nama' => 'bail|required|max:100',
            'harga_jual' => 'bail|required|digits_between:1,11|numeric',
            'kategori' => 'bail|required|digits_between:1,11|numeric|exists:kategori,id'
        ];
    }
}
