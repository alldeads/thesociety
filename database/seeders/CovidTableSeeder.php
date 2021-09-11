<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Covid;
use App\Models\Company;

class CovidTableSeeder extends Seeder
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
            Covid::factory(rand(10,20))->create([
                'company_id' => $company->id,
            ]);
        }
    }
}
