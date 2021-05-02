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
    public $timestamps = false;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function detailObat() {
        return $this->hasMany('App\Model\ObatDetail');
    }
}