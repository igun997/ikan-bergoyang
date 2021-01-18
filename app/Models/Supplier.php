<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Supplier
 * 
 * @property int $idsupplier
 * @property string|null $nama
 * @property string|null $notelp
 * @property int|null $isdelete
 * 
 * @property PoDetail $po_detail
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

	public function po_detail()
	{
		return $this->hasOne(PoDetail::class, 'suplier_id');
	}
}
