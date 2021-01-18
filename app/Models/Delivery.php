<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Delivery
 * 
 * @property int $id
 * @property string|null $user_id
 * @property string|null $nama
 * @property string|null $email
 * @property string|null $alamat
 * @property string|null $no_telp
 * @property int|null $idprovinsi
 * @property int|null $idkota
 * 
 * @property Collection|Transaksi[] $transaksis
 *
 * @package App\Models
 */
class Delivery extends Model
{
	protected $table = 'delivery';
	public $timestamps = false;

	protected $casts = [
		'idprovinsi' => 'int',
		'idkota' => 'int'
	];

	protected $fillable = [
		'user_id',
		'nama',
		'email',
		'alamat',
		'no_telp',
		'idprovinsi',
		'idkota'
	];

	public function transaksis()
	{
		return $this->hasMany(Transaksi::class);
	}
}
