<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PoDetail
 * 
 * @property int $id
 * @property int $barang_id
 * @property int $suplier_id
 * @property float $qty
 * @property float $price
 * @property float $subtotal
 * @property int $status
 * @property Carbon|null $received_date
 * @property Carbon|null $approved_date
 * @property Carbon|null $rejected_date
 * @property string|null $notes
 * 
 * @property Supplier $supplier
 * @property Barang $barang
 * @property Collection|PoReceived[] $po_receiveds
 *
 * @package App\Models
 */
class PoDetail extends Model
{
	protected $table = 'po_detail';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'barang_id' => 'int',
		'suplier_id' => 'int',
		'qty' => 'float',
		'price' => 'float',
		'subtotal' => 'float',
		'status' => 'int'
	];

	protected $dates = [
		'received_date',
		'approved_date',
		'rejected_date'
	];

	protected $fillable = [
		'id',
		'barang_id',
		'suplier_id',
		'qty',
		'price',
		'subtotal',
		'status',
		'received_date',
		'approved_date',
		'rejected_date',
		'notes'
	];

	public function supplier()
	{
		return $this->belongsTo(Supplier::class, 'suplier_id');
	}

	public function barang()
	{
		return $this->belongsTo(Barang::class);
	}

	public function po_receiveds()
	{
		return $this->hasMany(PoReceived::class, 'po_detail_id', 'id');
	}
}
