<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name'     => 'John Rexter Flores',
        	'email'    => 'john@test.com',
        	'password' => 'password'
        ]);

        User::create([
        	'name'     => 'Rojennette Ann Alivio',
        	'email'    => 'roj@test.com',
        	'password' => 'password'
        ]);

        User::create([
        	'name'     => 'Dave Scott Wong',
        	'email'    => 'dave@test.com',
        	'password' => 'password'
        ]);
    }
}
