<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Company;
use App\Models\Status;
use App\Models\Supplier;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;

class PurchaseOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = Company::all();
        $status    = Status::where('is_purchase_order', true)->get();

        $ship_via = ['ups', 'lbc', 'ap', 'fedex'];
        $method   = ['truck', 'air freight', 'rail freight'];

        foreach ($companies as $company) {
            for ($i=0; $i < rand(10,20); $i++) { 
                $tax   = rand(1, 20) / 100;
                $total = rand(5000, 9999);
                $sub   = $total;
                $disc  = rand(10, 30) / 100;

                $x = ($total * $disc);
                $total -= $x;

                $y =  ($total * $tax);
                $total += $y;

                $handling = rand(50, 200);

                $total += $handling;

                $suppliers = Supplier::where('company_id', $company->id)->get();

                PurchaseOrder::create([
                    'reference'  => mt_rand( 1000000000, 9999999999 ),
                    'supplier_id' => $suppliers->random()->id,
                    'company_id' => $company->id,
                    'ship_via'   => $ship_via[rand(0,3)],
                    'shipping_method' => $ship_via[rand(0,3)],
                    'notes'      => 'Payment first',
                    'sub_total'  => $sub,
                    'total'      => $total,
                    'quantity'   => rand(10,100),
                    'tax'        => $tax,
                    'discount'   => $disc,
                    'shipping'   => $handling,
                    'status_id'  => $status->random(1)->first()->id,
                    'approved_by'=> 1,
                    'created_by' => 1
                ]);
            }
        }
    }
}
