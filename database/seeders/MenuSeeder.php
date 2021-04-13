<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Menu;
use App\Models\Header;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $header = Header::create([
        	'name'  => 'Apps & Pages',
        	'order' => 1
        ]);

        $header->menus()->create([
        	'name'       => 'Dashboard',
        	'slug'       => 'home',
        	'url'        => 'home',
        	'icon'       => 'home',
            'base'       => 'dashboard',
            'is_export'  => false,
            'permission' => 'dashboard.view'
        ]);

        $header = Header::create([
        	'name'  => 'Accounting',
        	'order' => 2
        ]);

        $header->menus()->create([
        	'name'       => 'Chart of Accounts',
        	'slug'       => 'chart-of-accounts',
        	'url'        => 'accounting/chart-of-accounts',
        	'icon'       => 'columns',
            'base'       => 'chart',
            'is_export'  => true,
            'permission' => 'chart.view'
        ]);

        $header->menus()->create([
        	'name'       => 'Cash Flow',
        	'slug'       => 'cash-flow',
        	'url'        => 'accounting/cash-flow',
            'base'       => 'cashflow',
            'is_export'  => true,
        	'icon'       => 'activity',
            'permission' => 'cashflow.view'
        ]);

        // $header->menus()->create([
        // 	'name'  => 'Ledger',
        // 	'slug'  => 'ledger',
        // 	'url'   => 'accounting/ledger',
        // 	'icon'  => 'book-open'
        // ]);

        // $header = Header::create([
        // 	'name'  => 'Inventory',
        // 	'order' => 3
        // ]);

        // $header->menus()->create([
        // 	'name'  => 'Purchase Orders',
        // 	'slug'  => 'purchase-orders',
        // 	'url'   => 'inventory/purchase-orders',
        // 	'icon'  => 'clipboard'
        // ]);

        // $header->menus()->create([
        // 	'name'  => 'Supplies',
        // 	'slug'  => 'supplies',
        // 	'url'   => 'inventory/supplies',
        // 	'icon'  => 'package'
        // ]);

        // $header->menus()->create([
        // 	'name'  => 'Suppliers',
        // 	'slug'  => 'suppliers',
        // 	'url'   => 'inventory/suppliers',
        // 	'icon'  => 'user-check'
        // ]);

        $header = Header::create([
            'name'  => 'Customers Management',
            'order' => 3
        ]);

        $header->menus()->create([
            'name'       => 'Customers',
            'slug'       => 'customers',
            'url'        => 'customers/view',
            'icon'       => 'user-check',
            'base'       => 'customer',
            'is_export'  => true,
            'permission' => 'customer.view'
        ]);

        $header = Header::create([
            'name'  => 'Employees Management',
            'order' => 4
        ]);

        $header->menus()->create([
            'name'       => 'Employees',
            'slug'       => 'employees',
            'url'        => 'employees/view',
            'icon'       => 'users',
            'base'       => 'employee',
            'is_export'  => true,
            'permission' => 'employee.view'
        ]);

        $header->menus()->create([
            'name'       => 'Roles',
            'slug'       => 'roles',
            'url'        => 'roles/view',
            'icon'       => 'key',
            'base'       => 'role',
            'is_export'  => true,
            'permission' => 'role.view'
        ]);

        $header = Header::create([
            'name'  => 'Settings',
            'order' => 5
        ]);

        $header->menus()->create([
            'name'       => 'Company Details',
            'slug'       => 'company',
            'url'        => 'company/details',
            'icon'       => 'info',
            'base'       => 'company',
            'is_export'  => false,
            'permission' => 'company.view'
        ]);
    }
}
