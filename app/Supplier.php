<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';
    protected $primaryKey = 'idsupplier';
    protected $fillable = [
        'nama',
        'notelp',
        'isdelete'
    ];
    public $timestamps = false;
}
