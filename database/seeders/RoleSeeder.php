<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
        	'name' => 'owner'
        ]);

        Role::create([
        	'name' => 'accountant'
        ]);

        Role::create([
        	'name' => 'hr'
        ]);

        Role::create([
        	'name' => 'sales representative'
        ]);

        Role::create([
        	'name' => 'sales associate'
        ]);
    }
}
