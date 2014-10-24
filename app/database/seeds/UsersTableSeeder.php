<?php


class UsersTableSeeder extends Seeder {

	public function run()
	{

        Eloquent::unguard();

        User::create([

            'username' => 'admin',
            'password' => Hash::make('456'),
            'email' => 'somemail@gmail.com',
            'rol' => 'admin',
            'first_name' => 'Jhon Doe',
            'country' => 'Argentina',
            'city' => 'CABA',
            'gender' => 'Masculino',

        ]);
    }


}