<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BarangRule
 * 
 * @property int $id
 * @property int $barang_id
 * @property int $to_normal
 * 
 * @property Barang $barang
 *
 * @package App\Models
 */
class BarangRule extends Model
{
	protected $table = 'barang_rules';
	public $timestamps = false;

	protected $casts = [
		'barang_id' => 'int',
		'to_normal' => 'int'
	];

	protected $fillable = [
		'barang_id',
		'to_normal'
	];

	public function barang()
	{
		return $this->belongsTo(Barang::class);
	}
}
