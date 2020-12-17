<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPermintaan extends Model
{
    protected $table = 'detail_permintaan';
    protected $fillable = [
        'id', 'idpembelian', 'idbarang', 'qty'
    ];

    public $timestamps = false;

    public function barang() {
        return $this->hasOne('App\Barang', 'id', 'idbarang');
    }

}
