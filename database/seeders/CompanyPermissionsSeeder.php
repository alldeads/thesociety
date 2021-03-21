<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class CompanyPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
        	'name' => 'company.viewAny'
        ]);

        Permission::create([
        	'name' => 'company.view'
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
    }
}
