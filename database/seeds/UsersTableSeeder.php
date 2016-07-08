<?php
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
	public function run()
	{
		\DB::table('users')->insert(array(
			'name' => 'ibrahim z',
			'email' => 'ibrahimzerpa@gmail.com',
			'password' => \Hash::make('123456')
			));
	}
}
?>