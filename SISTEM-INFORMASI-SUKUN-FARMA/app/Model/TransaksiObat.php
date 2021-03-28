<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TransaksiObat extends Pivot
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transaksi_obat';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function resep() {
        return $this->belongsTo('App\Model\Resep');
    }

    public function satuanObat() {
        return $this->belongsTo('App\Model\SatuanObat');
    }
}