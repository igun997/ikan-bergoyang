<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Barang
 * 
 * @property int $id
 * @property string|null $kodebarang
 * @property string $nama_barang
 * @property string|null $deskripsi
 * @property int $kategori_id
 * @property float|null $harga
 * @property float|null $harga_bibit
 * @property int $stok
 * @property string|null $gambar
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Kategori $kategori
 * @property Collection|BarangPerawatan[] $barang_perawatans
 * @property Collection|BarangRule[] $barang_rules
 * @property Collection|Cart[] $carts
 * @property Collection|DetailTransaksi[] $detail_transaksis
 * @property Collection|PoDetail[] $po_details
 *
 * @package App\Models
 */
class Barang extends Model
{
	use SoftDeletes;
	protected $table = 'barang';

	protected $casts = [
		'kategori_id' => 'int',
		'harga' => 'float',
		'harga_bibit' => 'float',
		'stok' => 'int'
	];

	protected $fillable = [
		'kodebarang',
		'nama_barang',
		'deskripsi',
		'kategori_id',
		'harga',
		'harga_bibit',
		'stok',
		'gambar'
	];

	public function kategori()
	{
		return $this->belongsTo(Kategori::class);
	}

	public function barang_perawatans()
	{
		return $this->hasMany(BarangPerawatan::class);
	}

	public function barang_rules()
	{
		return $this->hasMany(BarangRule::class);
	}

	public function carts()
	{
		return $this->hasMany(Cart::class);
	}

	public function detail_transaksis()
	{
		return $this->hasMany(DetailTransaksi::class);
	}

	public function po_details()
	{
		return $this->hasMany(PoDetail::class);
	}
}
