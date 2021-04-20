<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user';
    public $timestamps = false;
    

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function role()
    {
        return $this->belongsTo('App\Model\Role');
    }
    public function pengeluaran() {
        return $this->hasMany('App\Model\Pengeluaran');
    }
    public function transaksi() {
        return $this->hasMany('App\Model\Transaksi');
    }
}