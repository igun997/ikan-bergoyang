<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBarangPerawatanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('barang_perawatan', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->bigInteger('barang_id')->unsigned()->index('barang_id');
			$table->integer('total_pakan');
			$table->string('nama_pakan', 100);
			$table->date('tgl_pakan')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('barang_perawatan');
	}

}
