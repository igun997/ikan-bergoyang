<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBarangTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('barang', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('kodebarang')->nullable();
			$table->string('nama_barang');
			$table->text('deskripsi', 65535)->nullable();
			$table->bigInteger('kategori_id')->unsigned()->index('fk1_barang');
			$table->float('harga', 10, 0)->nullable();
			$table->float('harga_bibit', 10, 0)->nullable();
			$table->integer('stok');
			$table->string('gambar')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('barang');
	}

}
