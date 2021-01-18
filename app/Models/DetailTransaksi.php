<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailTransaksi
 * 
 * @property int $id
 * @property int $transaksi_id
 * @property int $barang_id
 * @property int $qty
 * 
 * @property Transaksi $transaksi
 * @property Barang $barang
 *
 * @package App\Models
 */
class DetailTransaksi extends Model
{
	protected $table = 'detail_transaksi';
	public $timestamps = false;

	protected $casts = [
		'transaksi_id' => 'int',
		'barang_id' => 'int',
		'qty' => 'int'
	];

	protected $fillable = [
		'transaksi_id',
		'barang_id',
		'qty'
	];

	public function transaksi()
	{
		return $this->belongsTo(Transaksi::class);
	}

	public function barang()
	{
		return $this->belongsTo(Barang::class);
	}
}
