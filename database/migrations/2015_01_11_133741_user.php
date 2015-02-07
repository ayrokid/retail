<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class User extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
        {
        	$table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('username', 32)->unique();
            $table->string('password', 64);
            $table->string('name', 50);
            $table->string('email', 100)->unique();
            $table->string('status', 2);
            $table->string('image', 30);
            // required for Laravel 4.1.26
            $table->string('remember_token', 100)->nullable();
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
		Schema::drop('users');
	}

}
