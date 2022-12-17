<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\ChartAccount;
use App\Models\Company;

class ChartAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = Company::all();
        $file = file_get_contents(database_path('data/chart-accounts.json'));
	    $charts = json_decode($file);

        foreach ($companies as $company) {
        	foreach ($charts as $chart) {
        		ChartAccount::create([
        			'name'           => $chart->name,
			        'code'           => $chart->code,
			        'chart_type_id'  => $chart->type,
			        'company_id'     => $company->id,
			        'created_by'     => 1,
			        'updated_by'     => 1
        		]);
        	}
        }
    }
}
