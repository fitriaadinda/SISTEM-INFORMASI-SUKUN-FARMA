<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SatuanObat extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'satuan_obat';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function komparasiAwal() {
        return $this->hasMany('App\Model\KomparasiSatuanObat', 'satuan_awal_id');
    }

    public function komparasiAkhir() {
        return $this->hasMany('App\Model\KomparasiSatuanObat', 'satuan_akhir_id');
    }

    public function transaksiObat() {
        return $this->hasMany('App\Model\TransaksiObat');
    }

    public function resepObat() {
        return $this->hasMany('App\Model\ResepObat');
    }

    public function obatPengadaan() {
        return $this->hasMany('App\Model\ObatPengadaan');
    }
}