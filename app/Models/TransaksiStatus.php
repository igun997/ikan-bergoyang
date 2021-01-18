<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TransaksiStatus
 * 
 * @property int $idstatus
 * @property string|null $keterangan
 * 
 * @property Collection|Transaksi[] $transaksis
 *
 * @package App\Models
 */
class TransaksiStatus extends Model
{
	protected $table = 'transaksi_status';
	protected $primaryKey = 'idstatus';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idstatus' => 'int'
	];

	protected $fillable = [
		'keterangan'
	];

	public function transaksis()
	{
		return $this->hasMany(Transaksi::class, 'status');
	}
}
