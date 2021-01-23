<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailRetur
 * 
 * @property int $id
 * @property string|null $idpembelian
 * @property string|null $idbarang
 * @property int|null $qty
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class DetailRetur extends Model
{
	protected $table = 'detail_retur';

	protected $casts = [
		'qty' => 'int'
	];

	protected $fillable = [
		'idpembelian',
		'idbarang',
		'qty'
	];
}
