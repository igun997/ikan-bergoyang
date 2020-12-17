<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $table = 'delivery';
    protected $fillable = [
        'user_id', 'alamat', 'no_telp', 'nama', 'email', 'idprovinsi', 'idkota'
    ];

    public $timestamps = false;

    public function provinsi() {
        return $this->hasOne('App\Provinsi', 'idprovinsi', 'idprovinsi');
    }

    public function kota() {
        return $this->hasOne('App\Kota', 'idkota', 'idkota');
    }
}
