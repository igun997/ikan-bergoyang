<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBarangTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('barang', function(Blueprint $table)
		{
			$table->foreign('kategori_id', 'fk1_barang')->references('id')->on('kategori')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('barang', function(Blueprint $table)
		{
			$table->dropForeign('fk1_barang');
		});
	}

}
