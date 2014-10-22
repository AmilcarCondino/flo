<?php


class UsersTableSeeder extends Seeder {

	public function run()
	{

        Eloquent::unguard();

        User::create([

            'username' => 'kelek',
            'password' => Hash::make('456'),
            'email' => 'feakelek@gmail.com',
            'rol' => 'admin',
            'first_name' => 'Amilcar',
            'country' => 'Argentina',
            'city' => 'CABA',
            'gender' => 'Masculino',

        ]);
    }


}