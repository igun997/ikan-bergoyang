<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cart
 * 
 * @property int $id
 * @property int $user_id
 * @property int $barang_id
 * @property int $qty
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User $user
 * @property Barang $barang
 *
 * @package App\Models
 */
class Cart extends Model
{
	protected $table = 'cart';

	protected $casts = [
		'user_id' => 'int',
		'barang_id' => 'int',
		'qty' => 'int'
	];

	protected $fillable = [
		'user_id',
		'barang_id',
		'qty'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function barang()
	{
		return $this->belongsTo(Barang::class);
	}
}
