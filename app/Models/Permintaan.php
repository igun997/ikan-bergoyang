<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Permintaan
 * 
 * @property string $id
 * @property int|null $iduser
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $istemp
 * 
 * @property User|null $user
 * @property Collection|DetailPermintaan[] $detail_permintaans
 * @property Collection|Pembelian[] $pembelians
 *
 * @package App\Models
 */
class Permintaan extends Model
{
	protected $table = 'permintaan';
	public $incrementing = false;

	protected $casts = [
		'iduser' => 'int',
		'istemp' => 'int'
	];

	protected $fillable = [
		'iduser',
		'istemp'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'iduser');
	}

	public function detail_permintaans()
	{
		return $this->hasMany(DetailPermintaan::class, 'idpembelian');
	}

	public function pembelians()
	{
		return $this->hasMany(Pembelian::class, 'idpermintaan');
	}
}
