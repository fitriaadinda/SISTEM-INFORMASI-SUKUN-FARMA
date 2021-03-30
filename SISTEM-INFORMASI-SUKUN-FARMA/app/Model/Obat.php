<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obat';
    public $timestamps = false;
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