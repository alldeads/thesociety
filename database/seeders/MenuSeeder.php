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

        // $header->menus()->create([
        //     'name'       => 'Point Sytem (POS)',
        //     'slug'       => 'pos',
        //     'url'        => 'pos',
        //     'icon'       => 'airplay',
        //     'base'       => 'pos',
        //     'is_export'  => false,
        //     'permission' => 'pos.view'
        // ]);

        $header->menus()->create([
            'name'       => 'Covid-19 Tracing',
            'slug'       => 'covid',
            'url'        => 'covid/view',
            'icon'       => 'external-link',
            'base'       => 'covid',
            'is_export'  => false,
            'permission' => 'covid.view'
        ]);

        $header = Header::create([
        	'name'  => 'Accounting & Finance',
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

        $header->menus()->create([
            'name'       => 'Journal Entries',
            'slug'       => 'journal-entry',
            'url'        => 'accounting/journal-entry',
            'base'       => 'journal_entry',
            'is_export'  => true,
            'icon'       => 'book',
            'permission' => 'journal_entry.view'
        ]);

        // $header->menus()->create([
        //     'name'       => 'General Ledger',
        //     'slug'       => 'ledger',
        //     'url'        => 'accounting/ledger',
        //     'base'       => 'ledger',
        //     'is_export'  => true,
        //     'icon'       => 'columns',
        //     'permission' => 'ledger.view'
        // ]);

        $header->menus()->create([
            'name'       => 'Tax',
            'slug'       => 'tax',
            'url'        => 'accounting/tax',
            'icon'       => 'percent',
            'base'       => 'tax',
            'is_export'  => false,
            'permission' => 'tax.view'
        ]);

        $header->menus()->create([
            'name'       => 'Expenses',
            'slug'       => 'expenses',
            'url'        => 'expenses/view',
            'icon'       => 'hash',
            'base'       => 'expense',
            'is_export'  => true,
            'permission' => 'expense.view'
        ]);

        $header = Header::create([
            'name'  => 'Sales & Orders',
            'order' => 3
        ]);

        $header->menus()->create([
            'name'       => 'Sales Order',
            'slug'       => 'sales',
            'url'        => 'sales/view',
            'base'       => 'sale',
            'is_export'  => true,
            'icon'       => 'shopping-bag',
            'permission' => 'sale.view'
        ]);

        $header->menus()->create([
            'name'       => 'Payments',
            'slug'       => 'payments',
            'url'        => 'payments/view',
            'icon'       => 'dollar-sign',
            'base'       => 'payment',
            'is_export'  => false,
            'permission' => 'access.view'
        ]);

        $header->menus()->create([
            'name'       => 'Invoices',
            'slug'       => 'invoices',
            'url'        => 'invoices/view',
            'icon'       => 'file-text',
            'base'       => 'invoice',
            'is_export'  => false,
            'permission' => 'invoice.view'
        ]);

        $header = Header::create([
        	'name'  => 'Stocks & Inventory',
        	'order' => 3
        ]);

        $header->menus()->create([
            'name'       => 'Suppliers',
            'slug'       => 'suppliers',
            'url'        => 'inventory/suppliers/view',
            'base'       => 'supplier',
            'is_export'  => true,
            'icon'       => 'truck',
            'permission' => 'supplier.view'
        ]);

        $header->menus()->create([
            'name'       => 'Purchase Orders',
            'slug'       => 'purchase-orders',
            'url'        => 'inventory/purchase-orders/view',
            'base'       => 'purchase_order',
            'is_export'  => true,
            'icon'       => 'clipboard',
            'permission' => 'purchase_order.view'
        ]);

        $header->menus()->create([
            'name'       => 'Stock Level',
            'slug'       => 'stock-levels',
            'url'        => 'inventory/stock-levels/view',
            'base'       => 'stock_level',
            'is_export'  => true,
            'icon'       => 'layers',
            'permission' => 'stock_level.view'
        ]);

        $header->menus()->create([
            'name'       => 'Inventory History',
            'slug'       => 'histories',
            'url'        => 'inventory/histories/view',
            'base'       => 'history',
            'is_export'  => true,
            'icon'       => 'list',
            'permission' => 'history.view'
        ]);

        $header = Header::create([
            'name'  => 'Product Management',
            'order' => 3
        ]);

        $header->menus()->create([
            'name'       => 'Products',
            'slug'       => 'products',
            'url'        => 'products/view',
            'base'       => 'product',
            'is_export'  => true,
            'icon'       => 'box',
            'permission' => 'product.view'
        ]);

        $header->menus()->create([
            'name'       => 'Supplies',
            'slug'       => 'supplies',
            'url'        => 'supplies/view',
            'base'       => 'supply',
            'is_export'  => true,
            'icon'       => 'package',
            'permission' => 'supply.view'
        ]);

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
            'name'       => 'Access Rights',
            'slug'       => 'access',
            'url'        => 'access/view',
            'icon'       => 'lock',
            'base'       => 'access',
            'is_export'  => false,
            'permission' => 'access.view'
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
            'name'  => 'System Settings',
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

        $header->menus()->create([
            'name'       => 'Branches',
            'slug'       => 'branches',
            'url'        => 'company/branches/view',
            'icon'       => 'map',
            'base'       => 'branch',
            'is_export'  => true,
            'permission' => 'branch.view'
        ]);

        $header->menus()->create([
            'name'       => 'Payment Types',
            'slug'       => 'payment_types',
            'url'        => 'company/payment-types/view',
            'icon'       => 'credit-card',
            'base'       => 'payment_type',
            'is_export'  => false,
            'permission' => 'payment_type.view'
        ]);
    }
}
