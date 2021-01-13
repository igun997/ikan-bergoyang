<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retur extends Model
{
    protected $table = 'retur';
    protected $fillable = [
        'id', 'transaksi_id', 'reason', 'bukti_barang', 'status', 'noresi', 'user_id'
    ]; 

    public function transaksi(){
        return $this->hasOne('App\Transaksi', 'id', 'transaksi_id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function transaksistatus()
    {
        return $this->hasOne('App\TransaksiStatus', 'idstatus', 'status');
    }

    public function delivery() {
        return $this->hasOne('App\Delivery', 'user_id', 'user_id');
    }
}
