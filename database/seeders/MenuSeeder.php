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
        	'name'  => 'Dashboard',
        	'slug'  => 'home',
        	'url'   => 'home',
        	'icon'  => 'home'
        ]);

        $header = Header::create([
        	'name'  => 'Accounting',
        	'order' => 2
        ]);

        $header->menus()->create([
        	'name'  => 'Chart Of Accounts',
        	'slug'  => 'chart-of-accounts',
        	'url'   => 'accounting/chart-of-accounts',
        	'icon'  => 'book'
        ]);

        $header->menus()->create([
        	'name'  => 'Cash Flow',
        	'slug'  => 'cash-flow',
        	'url'   => 'accounting/cash-flow',
        	'icon'  => 'edit-3'
        ]);

        $header->menus()->create([
        	'name'  => 'Ledger',
        	'slug'  => 'ledger',
        	'url'   => 'accounting/ledger',
        	'icon'  => 'book-open'
        ]);

        $header = Header::create([
        	'name'  => 'Inventory',
        	'order' => 3
        ]);

        $header->menus()->create([
        	'name'  => 'Purchase Orders',
        	'slug'  => 'purchase-orders',
        	'url'   => 'inventory/purchase-orders',
        	'icon'  => 'clipboard'
        ]);

        $header->menus()->create([
        	'name'  => 'Supplies',
        	'slug'  => 'supplies',
        	'url'   => 'inventory/supplies',
        	'icon'  => 'package'
        ]);

        $header->menus()->create([
        	'name'  => 'Suppliers',
        	'slug'  => 'suppliers',
        	'url'   => 'inventory/suppliers',
        	'icon'  => 'user-check'
        ]);
    }
}