<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'provinsi';
    protected $fillable = [
        'idprovinsi',
        'nama'
    ];
    public $timestamps = false;
}
