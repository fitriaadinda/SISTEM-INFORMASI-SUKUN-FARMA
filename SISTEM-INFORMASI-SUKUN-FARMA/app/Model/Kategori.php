<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Kategori extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kategori';
    public $timestamps = false;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function obat() {
        return $this->hasMany('App\Model\Obat');
    }
}