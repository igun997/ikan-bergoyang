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
 * @property int $po_id
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
 * @property Po $po
 * @property Collection|PoReceived[] $po_receiveds
 *
 * @package App\Models
 */
class PoDetail extends Model
{
	protected $table = 'po_detail';
	public $timestamps = false;

	protected $casts = [
		'barang_id' => 'int',
		'suplier_id' => 'int',
		'po_id' => 'int',
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
		'barang_id',
		'suplier_id',
		'po_id',
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

	public function po()
	{
		return $this->belongsTo(Po::class);
	}

	public function po_receiveds()
	{
		return $this->hasMany(PoReceived::class);
	}
}
