<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsersDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users_detail', function(Blueprint $table)
		{
			$table->foreign('iduser', 'fk1_users_detail')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idprovinsi', 'fk2_users_detail')->references('idprovinsi')->on('provinsi')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('idkota', 'fk3_users_detail')->references('idkota')->on('kota')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users_detail', function(Blueprint $table)
		{
			$table->dropForeign('fk1_users_detail');
			$table->dropForeign('fk2_users_detail');
			$table->dropForeign('fk3_users_detail');
		});
	}

}
