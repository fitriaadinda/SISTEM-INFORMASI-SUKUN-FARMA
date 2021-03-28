<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'obat';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function kategori() {
        return $this->belongsTo('App\Model\Kategori');
    }

    public function batchObat() {
        return $this->hasMany('App\Model\BatchObat');
    }

    public function detailObat() {
        return $this->hasMany('App\Model\ObatDetail');
    }

    public function komparasiObat() {
        return $this->hasMany('App\Model\KomparasiSatuanObat');
    }
    
    public function resep(){
        return $this->belongsToMany('App\Model\Resep')
                    ->using('App\Model\ResepObat')
                    ->withPivot([
                        'qty',
                        'satuan_obat'
                    ]);
    }
}