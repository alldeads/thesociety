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
            'company_id' => 1,
        	'first_name' => 'John Rexter',
            'last_name'  => 'Flores',
        	'email'      => 'john@test.com',
        	'password'   => bcrypt('password')
        ]);

        User::create([
            'company_id' => 1,
        	'first_name' => 'Rojennette Ann',
            'last_name'  => 'Alivio',
        	'email'      => 'roj@test.com',
        	'password'   => bcrypt('password')
        ]);

        User::create([
            'company_id' => 1,
        	'first_name' => 'Dave Scott',
            'last_name'  => 'Wong',
        	'email'      => 'dave@test.com',
        	'password'   => bcrypt('password')
        ]);
    }
}
