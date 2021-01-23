<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBarangPerawatanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('barang_perawatan', function(Blueprint $table)
		{
			$table->foreign('barang_id', 'barang_perawatan_ibfk_1')->references('id')->on('barang')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('barang_perawatan', function(Blueprint $table)
		{
			$table->dropForeign('barang_perawatan_ibfk_1');
		});
	}

}
