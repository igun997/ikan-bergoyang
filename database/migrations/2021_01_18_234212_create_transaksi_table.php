<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransaksiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transaksi', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('user_id')->unsigned()->index('fk2_transaksi');
			$table->bigInteger('delivery_id')->unsigned()->index('fk3_transaksi');
			$table->integer('status')->index('fk1_transaksi');
			$table->float('total_harga', 10, 0)->nullable();
			$table->timestamps();
			$table->string('buktipembayaran')->nullable();
			$table->dateTime('kadaluarsabayar')->nullable();
			$table->string('noresi')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('transaksi');
	}

}
