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
        $permissions = ['view', 'read', 'export', 'create', 'update', 'delete'];

        $menus = [
            'dashboard', 'company', 'employee', 'role',
            'chart', 'cashflow', 'customer', 'supplier',
            'product', 'supply', 'purchase_order', 'tax',
            'journal_entry'
        ];

        foreach ($menus as $menu) {
            foreach ($permissions as $permission) {
                Permission::create([
                    'name' => $menu. '.' . $permission
                ]);
            }
        }
    }
}
