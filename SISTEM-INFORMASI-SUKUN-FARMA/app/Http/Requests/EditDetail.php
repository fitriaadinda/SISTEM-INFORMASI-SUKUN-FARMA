<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditDetail extends FormRequest
{
    public function rules()
    {
        return [
            'waktu_expired' => 'bail|required|max:100',
            'kode_batch' => 'bail|required|digits_between:1,11|numeric|exists:batch_obat,id',
            'nama_distributor' => 'bail|required|digits_between:1,11|numeric|exists:distributor,id',
            'harga_beli' => 'bail|required|digits_between:1,11|numeric',
            'stock' => 'bail|required|digits_between:1,11|numeric'
        ];
    }
}
