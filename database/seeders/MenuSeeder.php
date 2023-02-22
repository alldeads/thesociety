<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
        	'name'       => 'Dashboard',
        	'slug'       => 'home',
        	'url'        => 'home',
        	'icon'       => 'home',
            'base'       => 'dashboard',
            'is_export'  => false,
            'permission' => 'dashboard.view'
        ]);

        $menu = Menu::create([
        	'name'       => 'Accounting',
        	'slug'       => 'accounting',
        	'icon'       => 'book',
            'base'       => 'accounting',
            'is_export'  => false,
            'permission' => 'accounting.view'
        ]);

        Menu::create([
            'parent_menu_id' => $menu->id,
        	'name'       => 'Cash Flow',
        	'slug'       => 'cash-flow',
        	'url'        => 'accounting/cash-flow',
            'base'       => 'cash-flow',
            'is_export'  => false,
            'permission' => 'cash-flow.view'
        ]);

        Menu::create([
            'parent_menu_id' => $menu->id,
        	'name'       => 'Chart of Accounts',
        	'slug'       => 'chart-accounts',
        	'url'        => 'accounting/chart-accounts',
            'base'       => 'chart-accounts',
            'is_export'  => false,
            'permission' => 'chart-accounts.view'
        ]);

        Menu::create([
            'parent_menu_id' => $menu->id,
        	'name'       => 'Accounts Receivable',
        	'slug'       => 'accounts-receivable',
        	'url'        => 'accounting/accounts-receivable',
            'base'       => 'accounts-receivable',
            'is_export'  => false,
            'permission' => 'accounts_receivable.view'
        ]);

        Menu::create([
            'parent_menu_id' => $menu->id,
        	'name'       => 'Chart of Accounts',
        	'slug'       => 'chart-accounts',
        	'url'        => 'accounting/chart-accounts',
            'base'       => 'chart-accounts',
            'is_export'  => false,
            'permission' => 'chart-accounts.view'
        ]);

        $menu = Menu::create([
        	'name'       => 'Settings',
        	'slug'       => 'settings',
        	'url'        => 'settings',
        	'icon'       => 'align-justify',
            'base'       => 'settings',
            'is_export'  => false,
            'permission' => 'settings.view'
        ]);

        Menu::create([
            'parent_menu_id' => $menu->id,
        	'name'       => 'Branches',
        	'slug'       => 'branch',
        	'url'        => 'company/branches',
            'base'       => 'branch',
            'is_export'  => false,
            'permission' => 'branch.view'
        ]);

        Menu::create([
            'parent_menu_id' => $menu->id,
        	'name'       => 'Payment Types',
        	'slug'       => 'payment-type',
        	'url'        => 'company/payment-types',
            'base'       => 'payment-type',
            'is_export'  => false,
            'permission' => 'payment-type.view'
        ]);
    }
}
