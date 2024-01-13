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
        $permissions = [
            'create', // Create record
            'view', // View record
            'show', // Show module menu
            'update', // Update record
            'delete', // Delete record
            'export', // Export record
        ];

        $menus = [
            'dashboard', 
            // 'company', 
            // 'employee', 
            // 'role',
            // 'chart', 
            // 'cashflow', 
            // 'customer', 
            // 'supplier',
            // 'product', 
            // 'supply', 
            // 'purchase_order', 
            // 'tax',
            // 'journal_entry', 
            // 'ledger', 
            // 'branch', 
            // 'stock_level',
            // 'history', 
            // 'pos', 
            // 'sale',
            // 'payment_type',
            // 'access', 
            // 'payment', 
            // 'invoice', 
            // 'expense', 
            // 'receipt',
            // 'preference', 
            // 'accounts_payable', 
            // 'accounts_receivable'
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
