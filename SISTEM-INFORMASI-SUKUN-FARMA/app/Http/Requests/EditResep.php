<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditResep extends FormRequest
{
    public function rules()
    {
        return [
            'no_rekam_medis' => 'bail|required|max:100',
            'nama_pasien' => 'bail|required|max:100',
            'alamat' => 'bail|required|max:100',
            'no_telepon' => 'bail|required|max:14',
            'nama_dokter' => 'bail|required|max:100',
            'nama_klinik' => 'bail|max:100',
            'nama.*' => 'bail|required',
            'satuan.*' => 'bail|required',
            'qty.*' => 'bail|required'
        ];
    }
}
