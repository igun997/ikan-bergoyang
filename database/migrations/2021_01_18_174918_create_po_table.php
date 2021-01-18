<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('po', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('no_po', 100);
			$table->date('po_date')->nullable();
			$table->integer('status');
			$table->date('updated_at')->nullable();
			$table->date('created_at')->nullable();
			$table->date('deleted_at')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('po');
	}

}
