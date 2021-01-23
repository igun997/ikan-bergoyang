<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Retur
 * 
 * @property int $id
 * @property int $transaksi_id
 * @property string $reason
 * @property string $bukti_barang
 * @property int $status
 * @property string|null $noresi
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $user_id
 *
 * @package App\Models
 */
class Retur extends Model
{
	protected $table = 'retur';

	protected $casts = [
		'transaksi_id' => 'int',
		'status' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'transaksi_id',
		'reason',
		'bukti_barang',
		'status',
		'noresi',
		'user_id'
	];
}
