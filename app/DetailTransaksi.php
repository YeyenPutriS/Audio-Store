<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = 'detail_transaksi';

    public function transaksi()
    {
        return $this->hasMany('App\Transaksi','id_transaksi','id_transaksi');
    }

    public function barang()
    {
        return $this->hasMany('App\Barang','kode_barang','kode_barang');
    }
}
