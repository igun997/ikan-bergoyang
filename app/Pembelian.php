<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table = 'pembelian';
    protected $fillable = [
        'idpembelian', 'idpermintaan', 'idsupplier', 'totalharga', 'keterangan'
    ];

    public function supplier(){
        return $this->hasOne('App\Supplier', 'idsupplier', 'idsupplier');
    }
}
