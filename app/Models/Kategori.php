<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Kategori
 * 
 * @property int $id
 * @property string $nama_kategori
 * 
 * @property Collection|Barang[] $barangs
 *
 * @package App\Models
 */
class Kategori extends Model
{
	protected $table = 'kategori';
	public $timestamps = false;

	protected $fillable = [
		'nama_kategori'
	];

	public function barangs()
	{
		return $this->hasMany(Barang::class);
	}
}
