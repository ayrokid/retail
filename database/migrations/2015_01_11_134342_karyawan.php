<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Karyawan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('karyawan', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('nik', 10)->unique();
			$table->string('name', 50);
			$table->text('address');
			$table->integer('kecamatan_id');
			$table->string('telepon', 15);
			$table->string('hp', 13);
			$table->string('ktp', 50);
			$table->integer('bagian_id');
			$table->integer('gudang_id');
			$table->char('flag');
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
		Schema::drop('karyawan');
	}

}
