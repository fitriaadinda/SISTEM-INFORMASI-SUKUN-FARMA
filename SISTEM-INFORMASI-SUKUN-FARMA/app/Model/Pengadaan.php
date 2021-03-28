<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pengadaan';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function distibutor() {
        return $this->belongsTo('App\Model\Distributor');
    }

    public function obatDetail(){
        return $this->belongsToMany('App\Model\ObatDetail')
                    ->using('App\Model\ObatPengadaan')
                    ->withPivot([
                        'satuan_obat',
                        'jumlah',
                        'harga_beli'
                    ]);
    }
}