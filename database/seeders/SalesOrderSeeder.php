<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Company;
use App\Models\SalesOrder;
use App\Models\SalesOrderItem;
use App\Models\StockLevel;
use App\Models\InventoryHistory;

class SalesOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = Company::all();

        foreach ( $companies as $company ) {
            for ( $i = 0; $i < rand(3, 10); $i++ ) {
                $total = 0;
                $sub_total = 0;
                $discount = rand(0, 100);
                $items = [];
                $q = 0;

                foreach ( $company->products()->product()->get() as $product ) {

                    $proceed  = rand(0, 1);
                    $quantity = rand(1, 20);

                    if ( $proceed == 1 ) {
                        $items[] = [
                            'product_id' => $product->id,
                            'price'      => $product->srp_price,
                            'quantity'   => $quantity
                        ];

                        $sub_total += $product->srp_price * $quantity;
                        $total += $sub_total;
                        $q += $quantity;
                    }
                }

                $customer = rand(0, 1) == 0 ? null : $company->customers()->inRandomOrder()->first()->id;

                $stats = ['paid', 'cancelled'];

                $sl = SalesOrder::create([
                    'reference'   => 'SL-' . rand(111111, 999999),
                    'company_id'  => $company->id,
                    'customer_id' => $customer,
                    'total'       => $total - $discount,
                    'sub_total'   => $sub_total,
                    'discount'    => $discount,
                    'quantity'    => $q,
                    'type'        => $customer == null ? 'guest' : 'customer',
                    'status'      => $stats[rand(0,1)],
                    'created_by'  => 1,
                    'updated_by'  => 1
                ]);

                foreach ($items as $item) {
                    SalesOrderItem::create([
                        'sales_order_id' => $sl->id,
                        'product_id'  => $item['product_id'],
                        'price'       => $item['price'],
                        'quantity'    => $item['quantity'],
                    ]);

                    $sl = StockLevel::where([
                        'company_id' => $company->id,
                        'product_id' => $item['product_id']
                    ])->first();

                    $stock = $sl->in_stock ?? 0;

                    if ( !$sl ) {
                        $branch = $company->branches()->first();

                        StockLevel::create([
                            'company_id'  => $company->id,
                            'branch_id'   => $branch->id,
                            'product_id'  => $item['product_id'],
                            'in_stock'    => 0,
                            'after_stock' => 0
                        ]);
                    } else {
                        $sl->update([
                            'in_stock'    => $sl->after_stock,
                            'after_stock' => $sl->after_stock - $item['quantity']
                        ]);
                    }

                    InventoryHistory::create([
                        'reference'   => 'IN-' . rand(100000, 999999),
                        'company_id'  => $company->id,
                        'branch_id'   => $sl ? $sl->branch_id : $branch->id,
                        'product_id'  => $item['product_id'],
                        'inventory_type_id' => 7,
                        'in_stock'   => $stock,
                        'difference' => $item['quantity'],
                        'on_hand'    => $stock == 0 ? 0 : $stock - $item['quantity'],
                        'type'       => 0,
                        'created_by' => 1,
                    ]);
                }
            }
        }
    }
}
