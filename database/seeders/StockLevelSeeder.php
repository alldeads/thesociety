<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Company;
use App\Models\StockLevel;
use App\Models\InventoryType;
use App\Models\Branch;

class StockLevelSeeder extends Seeder
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
            foreach ( $company->products as $product ) {

                $branch = Branch::where('company_id', $company->id)->inRandomOrder()->first();
                $inventory = InventoryType::inRandomOrder()->first();

                $in_stock = rand(10, 100);
                $on_hand  = rand(10, 100);
 
                StockLevel::create([
                    'reference'  => 'SL-' . rand(100000, 999999),
                    'company_id' => $company->id,
                    'product_id' => $product->id,
                    'branch_id'  => $branch->id,
                    'inventory_type_id' => $inventory->id,
                    'in_stock'   => $in_stock,
                    'on_hand'    => $on_hand,
                    'differences'=> $in_stock - $on_hand
                ]);
            }
        }
    }
}
