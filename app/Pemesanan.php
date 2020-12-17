<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';
    protected $fillable = [
        'nama', 'email', 'warna', 'ukuran', 'bahan', 'alamat', 'jumlah', 'gambar', 'no_hp', 'status'
    ];

    public $timestamps = false;
}
