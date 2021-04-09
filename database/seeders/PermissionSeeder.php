<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Dashboard
        Permission::create([
            'name' => 'dashboard'
        ]);

    	// Company
        Permission::create([
        	'name' => 'company.view'
        ]);

        Permission::create([
            'name' => 'company.read'
        ]);

        Permission::create([
        	'name' => 'company.update'
        ]);

        Permission::create([
        	'name' => 'company.create'
        ]);

        Permission::create([
        	'name' => 'company.delete'
        ]);

        // Employees
        Permission::create([
        	'name' => 'employee.view'
        ]);

        Permission::create([
            'name' => 'employee.read'
        ]);

        Permission::create([
        	'name' => 'employee.update'
        ]);

        Permission::create([
        	'name' => 'employee.create'
        ]);

        Permission::create([
        	'name' => 'employee.delete'
        ]);

        Permission::create([
            'name' => 'employee.export'
        ]);

        // Roles
        Permission::create([
        	'name' => 'role.view'
        ]);

        Permission::create([
        	'name' => 'role.update'
        ]);

        Permission::create([
            'name' => 'role.read'
        ]);

        Permission::create([
        	'name' => 'role.create'
        ]);

        Permission::create([
        	'name' => 'role.delete'
        ]);

        Permission::create([
            'name' => 'role.export'
        ]);
    }
}
