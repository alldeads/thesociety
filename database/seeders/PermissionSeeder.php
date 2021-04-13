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
            'name' => 'dashboard.view'
        ]);

        Permission::create([
            'name' => 'dashboard.read'
        ]);

        Permission::create([
            'name' => 'dashboard.create'
        ]);

        Permission::create([
            'name' => 'dashboard.update'
        ]);

        Permission::create([
            'name' => 'dashboard.delete'
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

        // Chart of Accounts
        Permission::create([
            'name' => 'chart.view'
        ]);

        Permission::create([
            'name' => 'chart.update'
        ]);

        Permission::create([
            'name' => 'chart.read'
        ]);

        Permission::create([
            'name' => 'chart.create'
        ]);

        Permission::create([
            'name' => 'chart.delete'
        ]);

        Permission::create([
            'name' => 'chart.export'
        ]);

        // Cash Flow
        Permission::create([
            'name' => 'cashflow.view'
        ]);

        Permission::create([
            'name' => 'cashflow.update'
        ]);

        Permission::create([
            'name' => 'cashflow.read'
        ]);

        Permission::create([
            'name' => 'cashflow.create'
        ]);

        Permission::create([
            'name' => 'cashflow.delete'
        ]);

        Permission::create([
            'name' => 'cashflow.export'
        ]);

        // Customers
        Permission::create([
            'name' => 'customer.view'
        ]);

        Permission::create([
            'name' => 'customer.update'
        ]);

        Permission::create([
            'name' => 'customer.read'
        ]);

        Permission::create([
            'name' => 'customer.create'
        ]);

        Permission::create([
            'name' => 'customer.delete'
        ]);

        Permission::create([
            'name' => 'customer.export'
        ]);
    }
}
