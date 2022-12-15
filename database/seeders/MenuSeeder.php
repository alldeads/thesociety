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
        	'name'       => 'Chart of Accounts',
        	'slug'       => 'chart-accounts',
        	'url'        => 'chart-accounts',
            'base'       => 'chart-accounts',
            'is_export'  => false,
            'permission' => 'chart-accounts.view'
        ]);

        Menu::create([
        	'name'       => 'Settings',
        	'slug'       => 'settings',
        	'url'        => 'settings',
        	'icon'       => 'align-justify',
            'base'       => 'settings',
            'is_export'  => false,
            'permission' => 'settings.view'
        ]);
    }
}
