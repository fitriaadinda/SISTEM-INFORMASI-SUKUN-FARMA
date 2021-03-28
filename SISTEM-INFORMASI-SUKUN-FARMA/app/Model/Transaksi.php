<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transaksi';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    
    public function user() {
        return $this->belongsTo('App\Model\User');
    }

    public function obatDetail(){
        return $this->belongsToMany('App\Model\ObatDetail')
                    ->using('App\Model\TransaksiObat')
                    ->withPivot([
                        'qty',
                        'resep',
                        'satuan_obat',
                        'harga_satuan',
                        'tipe_transaksi'
                    ]);;
    }

}