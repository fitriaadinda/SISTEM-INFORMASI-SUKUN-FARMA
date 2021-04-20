<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'resep';
    public $timestamps = false;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function transaksiObat() {
        return $this->hasMany('App\Model\TransaksiObat');
    }

    public function obat(){
        return $this->belongsToMany('App\Model\Obat')
                    ->using('App\Model\ObatResep')
                    ->withPivot([
                        'qty',
                        'satuan_obat_id'
                    ]);
    }

}