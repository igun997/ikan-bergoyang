<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailPermintaan
 * 
 * @property int $id
 * @property string|null $idpembelian
 * @property int|null $idbarang
 * @property int|null $qty
 * 
 * @property Permintaan|null $permintaan
 * @property Barang|null $barang
 *
 * @package App\Models
 */
class DetailPermintaan extends Model
{
	protected $table = 'detail_permintaan';
	public $timestamps = false;

	protected $casts = [
		'idbarang' => 'int',
		'qty' => 'int'
	];

	protected $fillable = [
		'idpembelian',
		'idbarang',
		'qty'
	];

	public function permintaan()
	{
		return $this->belongsTo(Permintaan::class, 'idpembelian');
	}

	public function barang()
	{
		return $this->belongsTo(Barang::class, 'idbarang');
	}
}
