<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTransaksiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('transaksi', function(Blueprint $table)
		{
			$table->foreign('status', 'fk1_transaksi')->references('idstatus')->on('transaksi_status')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('user_id', 'fk2_transaksi')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('delivery_id', 'fk3_transaksi')->references('id')->on('delivery')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('transaksi', function(Blueprint $table)
		{
			$table->dropForeign('fk1_transaksi');
			$table->dropForeign('fk2_transaksi');
			$table->dropForeign('fk3_transaksi');
		});
	}

}
