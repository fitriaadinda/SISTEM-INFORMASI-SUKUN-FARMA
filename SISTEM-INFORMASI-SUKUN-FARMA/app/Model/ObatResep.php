<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ObatResep extends Pivot
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'obat_resep';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function satuanObat() {
        return $this->belongsTo('App\Model\SatuanObat');
    }

}