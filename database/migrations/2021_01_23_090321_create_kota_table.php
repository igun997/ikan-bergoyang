<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKotaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kota', function(Blueprint $table)
		{
			$table->integer('idkota')->primary();
			$table->integer('idprovinsi')->nullable();
			$table->string('nama')->nullable();
			$table->string('tipe')->nullable();
			$table->string('kodepos')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kota');
	}

}
