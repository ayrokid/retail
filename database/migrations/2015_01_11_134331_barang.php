<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Barang extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('barang', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('code', 30)->unique();
			$table->string('name', 30);
			$table->string('barcode', 30);
			$table->string('location', 30);
			$table->decimal('price_buy', 10, 2);
			$table->decimal('price_sell', 10, 2);
			$table->string('piece', 20);
			$table->decimal('stock_min', 2, 2);
			$table->decimal('stock_max', 5, 2);
			$table->decimal('stock_current', 5, 2);
			$table->integer('supplier_id');
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
		Schema::drop('barang');
	}

}
