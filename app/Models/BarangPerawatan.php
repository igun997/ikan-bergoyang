<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BarangPerawatan
 * 
 * @property int $id
 * @property int $barang_id
 * @property int $total_pakan
 * @property string $nama_pakan
 * @property Carbon|null $tgl_pakan
 * 
 * @property Barang $barang
 *
 * @package App\Models
 */
class BarangPerawatan extends Model
{
	protected $table = 'barang_perawatan';
	public $timestamps = false;

	protected $casts = [
		'barang_id' => 'int',
		'total_pakan' => 'int'
	];

	protected $dates = [
		'tgl_pakan'
	];

	protected $fillable = [
		'barang_id',
		'total_pakan',
		'nama_pakan',
		'tgl_pakan'
	];

	public function barang()
	{
		return $this->belongsTo(Barang::class);
	}
}
