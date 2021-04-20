<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TambahPengeluaran extends FormRequest
{
    public function rules()
    {
        return [
            'jenis_pengeluaran' => 'bail|required|digits_between:1,11|numeric|exists:jenis_pengeluaran,id',
            'waktu_pengeluaran' => 'bail|required|max:100',
            'jumlah' => 'bail|required|digits_between:1,11|numeric',
            'keterangan' => 'bail|required|max:255'
        ];
    }
}
