<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetailReturTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('detail_retur', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('idpembelian')->nullable();
			$table->string('idbarang')->nullable();
			$table->integer('qty')->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('detail_retur');
	}

}
