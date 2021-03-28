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
                    ->using('App\Model\ResepObat')
                    ->withPivot([
                        'qty',
                        'satuan_obat'
                    ]);
    }

}