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
            CompanySeeder::class,
            PermissionSeeder::class,
            StatusSeeder::class,
            RoleSeeder::class,
        	UserSeeder::class,
            MenuSeeder::class,
            ChartAccountSeeder::class,
            EmployeeSeeder::class,
            CompanyMenuSeeder::class,
            CompanyChartSeeder::class,
            CashFlowSeeder::class,
            CustomerSeeder::class,
            SupplierSeeder::class,
            ProductSeeder::class,
            SupplySeeder::class,
            TaxSeeder::class,
            PurchaseOrderSeeder::class,
            JournalEntrySeeder::class
        ]);
    }
}
