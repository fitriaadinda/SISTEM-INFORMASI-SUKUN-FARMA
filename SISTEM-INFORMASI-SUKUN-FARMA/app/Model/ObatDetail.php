<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ObatDetail extends Model
{
    protected $table = 'obat_detail';
    public $timestamps = false;
    protected $guarded = [];
    protected $with = ['batch'];

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