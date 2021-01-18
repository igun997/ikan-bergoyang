<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Supplier
 * 
 * @property int $idsupplier
 * @property string|null $nama
 * @property string|null $notelp
 * @property int|null $isdelete
 * 
 * @property Collection|Pembelian[] $pembelians
 *
 * @package App\Models
 */
class Supplier extends Model
{
	protected $table = 'supplier';
	protected $primaryKey = 'idsupplier';
	public $timestamps = false;

	protected $casts = [
		'isdelete' => 'int'
	];

	protected $fillable = [
		'nama',
		'notelp',
		'isdelete'
	];

	public function pembelians()
	{
		return $this->hasMany(Pembelian::class, 'idsupplier');
	}
}
