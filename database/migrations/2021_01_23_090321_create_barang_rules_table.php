<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBarangRulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('barang_rules', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->bigInteger('barang_id')->unsigned()->index('barang_id');
			$table->integer('to_normal');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('barang_rules');
	}

}
