<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\ChartAccount;
use App\Models\Company;
use App\Models\CompanyChartAccount;

class CompanyChartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $charts = ChartAccount::all();
        $companies = Company::all();

        foreach ($companies as $company) {
        	foreach ($charts as $chart) {
        		CompanyChartAccount::create([
        			'chart_name'     => $chart->name,
			        'code'           => $chart->code,
			        'chart_type_id'  => $chart->chart_type_id,
			        'company_id'     => $company->id,
			        'created_by'     => 1,
			        'updated_by'     => 1
        		]);
        	}
        }
    }
}
