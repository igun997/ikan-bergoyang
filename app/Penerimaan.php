<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penerimaan extends Model
{
    protected $table = 'penerimaan';
    protected $fillable = [
        'idpembelian', 'iduser'
    ];

    public function user(){
        return $this->hasOne('App\User', 'id', 'iduser');
    }
}
