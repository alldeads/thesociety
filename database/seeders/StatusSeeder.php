<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Status;
use App\Models\PurchaseOrderStatus;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
        	'name'  => 'new',
        	'color' => 'success'
        ]);

        Status::create([
            'name'  => 'draft',
            'color' => 'secondary',
            'is_purchase_order' => true,
            'is_customer' => false,
            'is_supplier' => false,
        ]);

        Status::create([
            'name'  => 'approved',
            'color' => 'success',
            'is_purchase_order' => true,
            'is_customer' => false,
            'is_supplier' => false,
        ]);

        Status::create([
            'name'  => 'closed',
            'color' => 'danger',
            'is_customer' => false,
            'is_supplier' => false,
            'is_purchase_order' => true
        ]);

        Status::create([
            'name'  => 'cancelled',
            'color' => 'warning',
            'is_customer' => false,
            'is_supplier' => false,
            'is_purchase_order' => true
        ]);

        Status::create([
            'name'  => 'hold',
            'color' => 'info',
            'is_customer' => false,
            'is_supplier' => false,
            'is_purchase_order' => true
        ]);

        Status::create([
            'name'  => 'in progress',
            'color' => 'primary',
            'is_customer' => false,
            'is_supplier' => false,
            'is_purchase_order' => true
        ]);

        Status::create([
            'name'  => 'pending',
            'color' => 'secondary',
            'is_customer' => false,
            'is_supplier' => false,
            'is_purchase_order' => true
        ]);

        Status::create([
            'name'  => 'revised',
            'color' => 'info',
            'is_customer' => false,
            'is_supplier' => false,
            'is_purchase_order' => true
        ]);

        Status::create([
            'name'  => 'waiting for approval',
            'color' => 'primary',
            'is_customer' => false,
            'is_supplier' => false,
            'is_purchase_order' => true
        ]);

        Status::create([
        	'name'  => 'prospect',
        	'color' => 'info'
        ]);

        Status::create([
        	'name'  => 'expired',
        	'color' => 'danger'
        ]);

        Status::create([
        	'name'  => 'suspended',
        	'color' => 'warning'
        ]);

        Status::create([
        	'name'  => 'active',
        	'color' => 'primary'
        ]);

        Status::create([
        	'name'  => 'inactive',
        	'color' => 'secondary'
        ]);
    }
}
