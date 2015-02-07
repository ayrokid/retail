<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UserTableSeeder');
	}

}

class UserTableSeeder extends Seeder {

    public function run()
    {
    	DB::table('users')->delete();

        $users = array(
        	array(
                'username' => 'admin',
                'status'   => '1',
                'password' => Hash::make('admin'),
                'name'     => 'Admin Name',
                'email'    => 'admin@admin.com',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'username' => 'user',
                'status'   => '1',
                'password' => Hash::make('user'),
                'name'     => 'User Name',
                'email'    => 'user@user.com',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            )
        ); 

        DB::table('users')->insert( $users );
    }
}