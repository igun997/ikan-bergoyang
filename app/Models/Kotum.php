<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Kotum
 * 
 * @property int $idkota
 * @property int|null $idprovinsi
 * @property string|null $nama
 * @property string|null $tipe
 * @property string|null $kodepos
 * 
 * @property Collection|UsersDetail[] $users_details
 *
 * @package App\Models
 */
class Kotum extends Model
{
	protected $table = 'kota';
	protected $primaryKey = 'idkota';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idkota' => 'int',
		'idprovinsi' => 'int'
	];

	protected $fillable = [
		'idprovinsi',
		'nama',
		'tipe',
		'kodepos'
	];

	public function users_details()
	{
		return $this->hasMany(UsersDetail::class, 'idkota');
	}
}
