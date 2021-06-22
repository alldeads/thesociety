<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Company;
use App\Models\Tax;

class TaxSeeder extends Seeder
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
        	Tax::create([
        		'company_id' => $company->id,
        		'name'       => 'Capital Gains Tax',
        		'percentage' => rand(1,20),
        	]);

        	Tax::create([
        		'company_id' => $company->id,
        		'name'       => 'Documentary Stamp Tax',
        		'percentage' => rand(1,20),
        	]);

        	Tax::create([
        		'company_id' => $company->id,
        		'name'       => 'Donor\'s Tax',
        		'percentage' => rand(1,20),
        	]);

        	Tax::create([
        		'company_id' => $company->id,
        		'name'       => 'Estate Tax',
        		'percentage' => rand(1,20),
        	]);

        	Tax::create([
        		'company_id' => $company->id,
        		'name'       => 'Income Tax',
        		'percentage' => rand(1,20),
        	]);

        	Tax::create([
        		'company_id' => $company->id,
        		'name'       => 'Percentage Tax',
        		'percentage' => rand(1,20),
        	]);

        	Tax::create([
        		'company_id' => $company->id,
        		'name'       => 'Value Added Tax',
        		'percentage' => rand(1,20),
        	]);

        	Tax::create([
        		'company_id' => $company->id,
        		'name'       => 'Withholding Tax',
        		'percentage' => rand(1,20),
        	]);

        	Tax::create([
        		'company_id' => $company->id,
        		'name'       => 'Excise Tax',
        		'percentage' => rand(1,20),
        	]);
        }
    }
}
