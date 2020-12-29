<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReturPembelian extends Model
{
    protected $table = 'retur_pembelian';
    protected $fillable = [
        'id', 'idpembelian', 'idpermintaan', 'idsupplier', 'totalharga', 'keterangan'
    ]; 

    public function supplier(){
        return $this->hasOne('App\Supplier', 'idsupplier', 'idsupplier');
    }
    
    public function pembelian(){
        return $this->hasOne('App\Pembelian', 'idpembelian', 'idpembelian');
    }
    
    public function permintaan(){
        return $this->hasOne('App\Permintaan', 'id', 'idpermintaan');
    }
}
