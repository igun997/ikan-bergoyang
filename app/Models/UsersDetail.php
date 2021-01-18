<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UsersDetail
 * 
 * @property int $iduser
 * @property string|null $alamat
 * @property int|null $idprovinsi
 * @property int|null $idkota
 * @property string|null $telepon
 * 
 * @property User $user
 * @property Provinsi|null $provinsi
 * @property Kotum|null $kotum
 *
 * @package App\Models
 */
class UsersDetail extends Model
{
	protected $table = 'users_detail';
	protected $primaryKey = 'iduser';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'iduser' => 'int',
		'idprovinsi' => 'int',
		'idkota' => 'int'
	];

	protected $fillable = [
		'alamat',
		'idprovinsi',
		'idkota',
		'telepon'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'iduser');
	}

	public function provinsi()
	{
		return $this->belongsTo(Provinsi::class, 'idprovinsi');
	}

	public function kotum()
	{
		return $this->belongsTo(Kotum::class, 'idkota');
	}
}
