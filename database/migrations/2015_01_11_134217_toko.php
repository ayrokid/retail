<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Toko extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('toko', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('name', 50);
			$table->text('address');
			$table->integer('kecamatan_id');
			$table->string('contact_person', 15);
			$table->string('telepon', 15);
			$table->string('fax', 15);
			$table->decimal('top', 2, 0);
			$table->decimal('plafon', 10, 2);
			$table->integer('grade_id');
			$table->integer('pelanggan_id');
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
		Schema::drop('toko');
	}

}
