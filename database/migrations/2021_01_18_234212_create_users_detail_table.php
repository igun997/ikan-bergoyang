<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_detail', function(Blueprint $table)
		{
			$table->integer('iduser')->unsigned()->primary();
			$table->string('alamat')->nullable();
			$table->integer('idprovinsi')->nullable()->index('fk2_users_detail');
			$table->integer('idkota')->nullable()->index('fk3_users_detail');
			$table->string('telepon', 20)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users_detail');
	}

}
