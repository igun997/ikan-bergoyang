<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDetailTransaksiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('detail_transaksi', function(Blueprint $table)
		{
			$table->foreign('transaksi_id', 'fk1_detail_transaksi')->references('id')->on('transaksi')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('barang_id', 'fk2_detail_transaksi')->references('id')->on('barang')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('detail_transaksi', function(Blueprint $table)
		{
			$table->dropForeign('fk1_detail_transaksi');
			$table->dropForeign('fk2_detail_transaksi');
		});
	}

}
