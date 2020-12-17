<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retur extends Model
{
    protected $table = 'retur';
    protected $fillable = ['id','transaksi_id','tanggal']; //sesuaikan
}
