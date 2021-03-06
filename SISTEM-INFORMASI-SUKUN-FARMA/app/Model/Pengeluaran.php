<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pengeluaran';
    public $timestamps = false;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function jenisPengeluaran() {
        return $this->belongsTo('App\Model\JenisPengeluaran');
    }
}