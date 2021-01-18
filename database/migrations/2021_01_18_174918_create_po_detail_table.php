<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePoDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('po_detail', function(Blueprint $table)
		{
			$table->integer('id')->index('id');
			$table->bigInteger('barang_id')->unsigned()->index('barang_id');
			$table->integer('suplier_id')->index('suplier_id');
			$table->float('qty', 10, 0);
			$table->float('price', 10, 0);
			$table->float('subtotal', 10, 0);
			$table->integer('status');
			$table->date('received_date')->nullable();
			$table->date('approved_date')->nullable();
			$table->date('rejected_date')->nullable();
			$table->text('notes', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('po_detail');
	}

}
