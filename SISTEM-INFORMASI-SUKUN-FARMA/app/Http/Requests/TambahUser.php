<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TambahUser extends FormRequest
{
    public function rules()
    {
        return [
            'nama' => 'bail|required|max:100',
            'alamat' => 'bail|required|max:255',
            'email' => 'bail|required|max:100',
            'password' => 'bail|required|max:100',
            'no_hp' => 'bail|required|max:100',
            'role' => 'bail|required|digits_between:1,11|numeric|exists:role,id'
        ];
    }
}
