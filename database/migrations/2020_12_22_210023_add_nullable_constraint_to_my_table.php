<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullableConstraintToMyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('retur', function (Blueprint $table) {
            $table->integer('noresi')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('retur', function (Blueprint $table) {
            $table->integer('noresi')->nullable(false)->change();
        });
    }
}
