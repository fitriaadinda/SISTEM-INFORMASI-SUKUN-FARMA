<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'distributor';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function pengadaan() {
        return $this->hasMany('App\Model\Pengadaan');
    }
}