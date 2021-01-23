<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBarangRulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('barang_rules', function(Blueprint $table)
		{
			$table->foreign('barang_id', 'barang_rules_ibfk_1')->references('id')->on('barang')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('barang_rules', function(Blueprint $table)
		{
			$table->dropForeign('barang_rules_ibfk_1');
		});
	}

}
