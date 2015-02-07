<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Kota extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kota', function(Blueprint $table)
		{
			$table->engine  = 'InnoDB';
			$table->increments('id');
			$table->string('name');
			$table->string('area_code', 5)->unique();
			$table->integer('propinsi_id');
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
		Schema::drop('kota');
	}

}
