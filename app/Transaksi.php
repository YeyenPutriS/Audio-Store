<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey='id_transaksi';
    protected $keyType = 'string';
    public $incrementing = false;

    public function user()
    {
        return $this->hasMany('App\User','id','id_user');
    }
}
