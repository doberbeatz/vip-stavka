<?php

use Doberbeatz\Laraback\Models\Users;

class AdminTableSeeder extends Seeder {

	public function run()
	{
		Users::create([
			'login' => 'admin',
			'name' => 'Админ',
			'email' => 'admin@vipstavka.ru',
			'password' => Hash::make('flvbybcnhfnjh')
		]);
	}

}