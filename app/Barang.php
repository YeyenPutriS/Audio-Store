<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'kode_barang';
    protected $keyType = 'string';
    public $incrementing = false;

    public function cart()
    {
        return $this->belongsTo('App\Cart','kode_barang','kode_barang');
    }

    public function dtlTransaksi()
    {
        return $this->belongsTo('App\Detail_Transaksi','kode_barang','kode_barang');
    }
}
