<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retur extends Model
{
    protected $table = 'retur';
    protected $fillable = [
        'id', 'transaksi_id', 'reason', 'bukti_barang', 'status', 'noresi'
    ]; 

    public function transaksi(){
        return $this->hasOne('App\Transaksi', 'id', 'iduser');
    }

    public function status()
    {
        return $this->hasOne('App\TransaksiStatus', 'idstatus', 'status');
    }
}
