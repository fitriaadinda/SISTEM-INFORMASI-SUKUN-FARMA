<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function role()
    {
        // return User->
        // 3 parameter, tapi yang wajib diisi cuman 1 yaitu modelnya
        // parameter pertama : model
        // parameter kedua : foreign key -> bakal otomatis keisi dengan tabel_id = role_id
        // parameter ketiga : primary key -> bakal otomatis keisi dengan id = id
        return $this->belongsTo('App\Model\Role');
    }
}