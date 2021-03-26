<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            CompanySeeder::class,
        	UserSeeder::class,
            MenuSeeder::class,
            ChartAccountSeeder::class
        ]);
    }
}
