<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JenisPengeluaran extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'jenis_pengeluaran';
    public $timestamps = false;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function pengeluaran() {
        return $this->hasMany('App\Model\Pengeluaran');
    }
}