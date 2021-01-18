<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPoReceivedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('po_received', function(Blueprint $table)
		{
			$table->foreign('po_detail_id', 'po_received_ibfk_1')->references('id')->on('po_detail')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('po_received', function(Blueprint $table)
		{
			$table->dropForeign('po_received_ibfk_1');
		});
	}

}
