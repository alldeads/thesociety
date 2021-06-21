<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Company;
use App\Models\JournalEntry;

use Carbon\Carbon;

class JournalEntrySeeder extends Seeder
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
        	$coa       = $company->chart_accounts->random(1)->first()->id;
        	$employees = $company->employees->random(1)->first()->id;

        	$debit  = rand(10000, 50000);

        	$cashflow = JournalEntry::create([
        		'company_id'      => $company->id,
        		'created_by'      => 1,
        		'updated_by'      => 1,
        		'account_type_id' => $coa,
        		'payor'           => $employees,
        		'credit'          => 0,
                'posting_date'    => Carbon::now()->addDays(rand(0, 3))->format('Y-m-d'),
        		'debit'           => $debit
        	]);

        	for ($i = 0; $i < rand(15, 20); $i++) { 

        		$debit  = rand(10000, 50000);
        		$credit = rand(10000, 50000);

        		$coa       = $company->chart_accounts->random(1)->first()->id;
        		$employees = $company->employees->random(1)->first()->id;

        		$rand = rand(0, 1);

        		$cashflow = JournalEntry::create([
	        		'company_id'      => $company->id,
	        		'created_by'      => 1,
	        		'updated_by'      => 1,
	        		'account_type_id' => $coa,
	        		'payor'           => $employees,
	        		'credit'          => $rand == 0 ? $credit : 0,
	        		'debit'           => $rand != 0 ? $debit : 0,
                    'posting_date'    => now()->format('Y-m-d'),
	        	]);
        	}
        }
    }
}
