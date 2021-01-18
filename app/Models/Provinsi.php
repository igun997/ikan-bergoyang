<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Provinsi
 * 
 * @property int $idprovinsi
 * @property string|null $nama
 * 
 * @property Collection|UsersDetail[] $users_details
 *
 * @package App\Models
 */
class Provinsi extends Model
{
	protected $table = 'provinsi';
	protected $primaryKey = 'idprovinsi';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idprovinsi' => 'int'
	];

	protected $fillable = [
		'nama'
	];

	public function users_details()
	{
		return $this->hasMany(UsersDetail::class, 'idprovinsi');
	}
}
