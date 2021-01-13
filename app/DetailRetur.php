<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailRetur extends Model
{
    protected $table = 'detail_retur';
    protected $fillable = [
        'idpembelian', 'idbarang', 'qty'
    ];

    public $timestamps = false;

    public function barang() {
        return $this->hasOne('App\Barang', 'id', 'barang_id');
    }
}
