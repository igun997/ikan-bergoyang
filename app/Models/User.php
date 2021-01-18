<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 * 
 * @property int $id
 * @property string $nama
 * @property string $email
 * @property string $password
 * @property int $level
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Cart[] $carts
 * @property Collection|Permintaan[] $permintaans
 * @property Collection|Transaksi[] $transaksis
 * @property UsersDetail $users_detail
 *
 * @package App\Models
 */
class User extends Model
{
	use SoftDeletes;
	protected $table = 'users';

	protected $casts = [
		'level' => 'int'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'nama',
		'email',
		'password',
		'level',
		'remember_token'
	];

	public function carts()
	{
		return $this->hasMany(Cart::class);
	}

	public function permintaans()
	{
		return $this->hasMany(Permintaan::class, 'iduser');
	}

	public function transaksis()
	{
		return $this->hasMany(Transaksi::class);
	}

	public function users_detail()
	{
		return $this->hasOne(UsersDetail::class, 'iduser');
	}
}
