<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    protected $table = 'permintaan';
    protected $fillable = [
        'id', 'iduser','istemp'
    ];

    public function user(){
        return $this->hasOne('App\User', 'id', 'iduser');
    }

    public function detail(){
        return $this->hasMany('App\DetailPermintaan', 'idpembelian', 'id');
    }
}
