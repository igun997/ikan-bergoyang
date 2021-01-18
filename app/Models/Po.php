<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Po
 * 
 * @property int $id
 * @property string $no_po
 * @property Carbon|null $po_date
 * @property int $status
 * @property Carbon|null $updated_at
 * @property Carbon|null $created_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class Po extends Model
{
	use SoftDeletes;
	protected $table = 'po';

	protected $casts = [
		'status' => 'int'
	];

	protected $dates = [
		'po_date'
	];

	protected $fillable = [
		'no_po',
		'po_date',
		'status'
	];
}
