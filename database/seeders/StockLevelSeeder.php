<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Company;
use App\Models\StockLevel;
use App\Models\InventoryType;
use App\Models\InventoryHistory;
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

                $in_stock = rand(50, 100);
                $on_hand  = rand(50, 100);

                $difference = rand(1, 20);
                $type = rand(0, 1);

                $after = $type == 0 ?  $in_stock - $difference : $in_stock + $difference;
                $notes = "Test notes";
 
                StockLevel::create([
                    'reference'  => 'SL-' . rand(100000, 999999),
                    'company_id' => $company->id,
                    'product_id' => $product->id,
                    'branch_id'  => $branch->id,
                    'in_stock'    => $in_stock,
                    'after_stock' => $after,
                    'created_by' => 1,
                    'updated_by' => 1
                ]);

                InventoryHistory::create([
                    'reference'  => 'IN-' . rand(100000, 999999),
                    'company_id' => $company->id,
                    'product_id' => $product->id,
                    'branch_id'  => $branch->id,
                    'inventory_type_id' => $inventory->id,
                    'in_stock'    => $in_stock,
                    'notes'       => $notes,
                    'on_hand'     => $after,
                    'type'        => $type,
                    'difference'  => $difference,
                    'created_by' => 1,
                ]);
            }
        }
    }
}
