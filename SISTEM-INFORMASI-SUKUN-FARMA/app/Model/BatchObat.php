<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BatchObat extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'batch_obat';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function obat() {
        return $this->belongsTo('App\Model\Obat');
    }

    public function obatDetail() {
        return $this->hasMany('App\Model\ObatDetail');
    }
}