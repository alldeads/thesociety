<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Company;
use App\Models\Product;

class SupplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = Company::all();

        foreach ($companies as $company) {
    		Product::factory(rand(10,20))->create([
        		'company_id' => $company->id,
        		'type' => 'supply'
        	]);
        }
    }
}
