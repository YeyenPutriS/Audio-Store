<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

    public function barang(){
        return $this->hasMany('App\Barang','kode_barang','kode_barang');
    }

}
