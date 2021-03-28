<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ObatDetail extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'obat_detail';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function batch() {
        return $this->belongsTo('App\Model\BatchObat');
    }

    public function obat() {
        return $this->belongsTo('App\Model\Obat');
    }

    public function pengadaan(){
        return $this->belongsToMany('App\Model\Pengadaan')
                    ->using('App\Model\ObatPengadaan')
                    ->withPivot([
                        'satuan_obat',
                        'jumlah',
                        'harga_beli'
                    ]);
    }

    public function transaksi(){
        return $this->belongsToMany('App\Model\Transaksi')
                    ->using('App\Model\TransaksiObat')
                    ->withPivot([
                        'qty',
                        'resep',
                        'satuan_obat',
                        'harga_satuan',
                        'tipe_transaksi'
                    ]);
    }
}