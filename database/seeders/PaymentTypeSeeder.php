<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Company;
use App\Models\PaymentType;

class PaymentTypeSeeder extends Seeder
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
            PaymentType::create([
                'company_id' => $company->id,
                'name' => 'cash',
                'type' => 'other'
            ]);

            PaymentType::create([
                'company_id' => $company->id,
                'name' => 'gcash',
                'type' => 'other'
            ]);
        }
    }
}
