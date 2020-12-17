<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiStatus extends Model
{
    protected $table = 'transaksi_status';
    protected $fillable = [
        'idstatus', 'keterangan'
    ];
    public $timestamps = false;
}
