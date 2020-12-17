<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersDetail extends Model
{
    protected $table = 'users_detail';
    protected $fillable = [
        'iduser',
        'alamat',
        'idprovinsi',
        'idkota',
        'telepon',
    ];
    public $timestamps = false;

    public function provinsi(){
        return $this->belongsTo('App\Provinsi', 'idprovinsi', 'idprovinsi');
    }

    public function kota(){
        return $this->belongsTo('App\Kota', 'idkota', 'idkota');
    }
}
