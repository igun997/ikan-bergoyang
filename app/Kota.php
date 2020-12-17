<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = 'kota';
    protected $fillable = [
        'idkota',
        'idprovinsi',
        'nama',
        'tipe',
        'kodepos'
    ];
    public $timestamps = false;
}
