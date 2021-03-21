<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'super-admin']);

        $user = User::create([
            'company_id' => 1,
        	'first_name' => 'John Rexter',
            'last_name'  => 'Flores',
        	'email'      => 'john@test.com',
        	'password'   => bcrypt('password')
        ]);

        $user->assignRole($role);

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
