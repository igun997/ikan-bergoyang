<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PoReceived
 * 
 * @property int $id
 * @property int $qty
 * @property int $po_detail_id
 * @property Carbon|null $created_at
 * 
 * @property PoDetail $po_detail
 *
 * @package App\Models
 */
class PoReceived extends Model
{
	protected $table = 'po_received';
	public $timestamps = false;

	protected $casts = [
		'qty' => 'int',
		'po_detail_id' => 'int'
	];

	protected $fillable = [
		'qty',
		'po_detail_id'
	];

	public function po_detail()
	{
		return $this->belongsTo(PoDetail::class);
	}
}
