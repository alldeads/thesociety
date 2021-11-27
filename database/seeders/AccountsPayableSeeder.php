<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\AccountsPayable;
use Carbon\Carbon;

class AccountsPayableSeeder extends Seeder
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

            $rand = rand(15,30);

            for ($i = 0; $i < $rand; $i++) {
                $coa       = $company->chart_accounts->where('chart_name', "Accounts Payable")->first()->id;
                $employees = $company->employees->random(1)->first()->id;

                $debit  = rand(10000, 50000);

                $expense = AccountsPayable::create([
                    'company_id'      => $company->id,
                    'created_by'      => 1,
                    'updated_by'      => 1,
                    'account_type_id' => $coa,
                    'payor'           => $employees,
                    'amount'          => $debit,
                    'posting_date'    => Carbon::now()->addDays(rand(0, 3))->format('Y-m-d')
                ]);
            }	
        }
    }
}
