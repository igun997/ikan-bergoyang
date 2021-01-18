<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeliveryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('delivery', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('user_id')->nullable();
			$table->string('nama')->nullable();
			$table->string('email')->nullable();
			$table->string('alamat')->nullable();
			$table->string('no_telp')->nullable();
			$table->integer('idprovinsi')->nullable();
			$table->integer('idkota')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('delivery');
	}

}
