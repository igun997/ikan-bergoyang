<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaksi
 * 
 * @property int $id
 * @property int $user_id
 * @property int $delivery_id
 * @property int $status
 * @property float|null $total_harga
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $buktipembayaran
 * @property Carbon|null $kadaluarsabayar
 * @property string|null $noresi
 * 
 * @property TransaksiStatus $transaksi_status
 * @property User $user
 * @property Delivery $delivery
 * @property Collection|DetailTransaksi[] $detail_transaksis
 *
 * @package App\Models
 */
class Transaksi extends Model
{
	protected $table = 'transaksi';

	protected $casts = [
		'user_id' => 'int',
		'delivery_id' => 'int',
		'status' => 'int',
		'total_harga' => 'float'
	];

	protected $dates = [
		'kadaluarsabayar'
	];

	protected $fillable = [
		'user_id',
		'delivery_id',
		'status',
		'total_harga',
		'buktipembayaran',
		'kadaluarsabayar',
		'noresi'
	];

	public function transaksi_status()
	{
		return $this->belongsTo(TransaksiStatus::class, 'status');
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function delivery()
	{
		return $this->belongsTo(Delivery::class);
	}

	public function detail_transaksis()
	{
		return $this->hasMany(DetailTransaksi::class);
	}
}
