<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			User::create([

                'username' => 'kelek',
                'password' => Hash::make('456'),
                'email' => 'feakelek@gmail.com',
                'rol' => 'admin',
                'first_name' => 'Amilcar',
                'country' => 'Argentina',
                'city' => 'CABA',
                'gender' => 'Masculino'

			]);
		}
	}

}