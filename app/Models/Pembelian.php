<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pembelian
 * 
 * @property string $idpembelian
 * @property string|null $idpermintaan
 * @property int|null $idsupplier
 * @property int|null $totalharga
 * @property string|null $keterangan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $status
 * 
 * @property Permintaan|null $permintaan
 * @property Supplier|null $supplier
 * @property Penerimaan $penerimaan
 *
 * @package App\Models
 */
class Pembelian extends Model
{
	protected $table = 'pembelian';
	protected $primaryKey = 'idpembelian';
	public $incrementing = false;

	protected $casts = [
		'idsupplier' => 'int',
		'totalharga' => 'int'
	];

	protected $fillable = [
		'idpermintaan',
		'idsupplier',
		'totalharga',
		'keterangan',
		'status'
	];

	public function permintaan()
	{
		return $this->belongsTo(Permintaan::class, 'idpermintaan');
	}

	public function supplier()
	{
		return $this->belongsTo(Supplier::class, 'idsupplier');
	}

	public function penerimaan()
	{
		return $this->hasOne(Penerimaan::class, 'idpembelian');
	}
}
