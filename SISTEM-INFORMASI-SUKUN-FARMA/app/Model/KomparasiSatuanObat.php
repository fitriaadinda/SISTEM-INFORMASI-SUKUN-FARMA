<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KomparasiSatuanObat extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'komparasi_satuan_obat';
    public $timestamps = false;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function obat() {
        return $this->belongsTo('App\Model\Obat');
    }
    public function satuanAwal() {
        return $this->belongsTo('App\Model\SatuanObat', 'satuan_awal_id');
    }
    public function satuanAkhir() {
        return $this->belongsTo('App\Model\SatuanObat', 'satuan_akhir_id');
    }
}