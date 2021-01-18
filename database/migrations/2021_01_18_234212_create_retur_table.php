<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReturTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('retur', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('transaksi_id');
			$table->string('reason');
			$table->string('bukti_barang');
			$table->integer('status');
			$table->string('noresi')->nullable();
			$table->timestamps();
			$table->integer('user_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('retur');
	}

}
