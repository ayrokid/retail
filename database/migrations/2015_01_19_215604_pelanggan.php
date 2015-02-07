<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pelanggan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pelanggan', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('name', 50);
			$table->text('address');
			$table->string('hp', 15);
			$table->string('telepon', 15);
			$table->string('fax', 15);
			$table->integer('kota_id');
			$table->string('zip_code', 10);
			$table->string('email', 30);
			$table->string('sex', 1);
			$table->string('status', 2);
			$table->string('agama', 10);
			$table->integer('tmpt_lhr');
			$table->date('tgl_lhr');
			$table->string('type_id', 1);
			$table->string('no_id', 20);
			$table->string('npwp', 20);
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
		Schema::drop('pelanggan');
	}

}
