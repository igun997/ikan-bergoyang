<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Penerimaan
 * 
 * @property string $idpembelian
 * @property int|null $iduser
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Pembelian $pembelian
 *
 * @package App\Models
 */
class Penerimaan extends Model
{
	protected $table = 'penerimaan';
	protected $primaryKey = 'idpembelian';
	public $incrementing = false;

	protected $casts = [
		'iduser' => 'int'
	];

	protected $fillable = [
		'iduser'
	];

	public function pembelian()
	{
		return $this->belongsTo(Pembelian::class, 'idpembelian');
	}
}
