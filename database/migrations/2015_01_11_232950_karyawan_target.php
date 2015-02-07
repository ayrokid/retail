<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KaryawanTarget extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('target', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('tahun', 4);
			$table->decimal('b01', 10, 2);
			$table->decimal('b02', 10, 2);
			$table->decimal('b03', 10, 2);
			$table->decimal('b04', 10, 2);
			$table->decimal('b05', 10, 2);
			$table->decimal('b06', 10, 2);
			$table->decimal('b07', 10, 2);
			$table->decimal('b08', 10, 2);
			$table->decimal('b09', 10, 2);
			$table->decimal('b10', 10, 2);
			$table->decimal('b11', 10, 2);
			$table->decimal('b12', 10, 2);
			$table->integer('karyawan_id');
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
		Schema::drop('target');
	}

}
