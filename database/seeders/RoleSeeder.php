<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\Company;
use App\Models\CompanyRole;

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
        	'name' => 'hr associate'
        ]);

        Role::create([
        	'name' => 'sales representative'
        ]);

        Role::create([
        	'name' => 'sales associate'
        ]);

        Role::create([
            'name' => 'inventory analyst'
        ]);

        Role::create([
            'name' => 'web developer'
        ]);

        $roles = Role::all();
        $companies = Company::all();

        foreach ($companies as $company) {
            foreach ($roles as $role) {
                CompanyRole::create([
                    'company_id' => $company->id,
                    'role_name'  => $role->name,
                    'updated_by' => 1,
                    'created_by' => 1,
                ]);
            }
        }
    }
}
