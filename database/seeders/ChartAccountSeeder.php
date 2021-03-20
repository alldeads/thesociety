<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\ChartType;

class ChartAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = ChartType::create([
        	'name' => 'Assets'
        ]);

        $type->accounts()->create([
        	'code' => '10001',
        	'name' => 'Cash'
        ]);

        $type->accounts()->create([
        	'code' => '10002',
        	'name' => 'Petty Cash'
        ]);

        $type->accounts()->create([
        	'code' => '10003',
        	'name' => 'Accounts Receivable'
        ]);

        $type->accounts()->create([
        	'code' => '10004',
        	'name' => 'Allowance For Doubtful Accounts'
        ]);

        $type->accounts()->create([
        	'code' => '10005',
        	'name' => 'Fixed Assets'
        ]);

        $type = ChartType::create([
        	'name' => 'Liabilities'
        ]); 

        $type->accounts()->create([
        	'code' => '20005',
        	'name' => 'Accounts Payable'
        ]);

        $type->accounts()->create([
        	'code' => '20006',
        	'name' => 'Accrued Liabilities'
        ]);

        $type->accounts()->create([
        	'code' => '20007',
        	'name' => 'Taxes Payable'
        ]);

        $type->accounts()->create([
        	'code' => '20008',
        	'name' => 'Wages Payable'
        ]);

        $type->accounts()->create([
        	'code' => '20009',
        	'name' => 'Notes Payable'
        ]);

        $type = ChartType::create([
        	'name' => 'Equity'
        ]); 

        $type->accounts()->create([
        	'code' => '30001',
        	'name' => 'Common Stock'
        ]);

        $type->accounts()->create([
        	'code' => '30002',
        	'name' => 'Preferred Stock'
        ]);

        $type->accounts()->create([
        	'code' => '30003',
        	'name' => 'Retained Earnings'
        ]);

        $type = ChartType::create([
        	'name' => 'Revenue'
        ]); 

        $type->accounts()->create([
        	'code' => '40001',
        	'name' => 'Sales Returns and Allowances'
        ]);

        $type->accounts()->create([
        	'code' => '40002',
        	'name' => 'Revenue'
        ]);

        $type = ChartType::create([
        	'name' => 'Expenses'
        ]);

        $type->accounts()->create([
        	'code' => '50001',
        	'name' => 'Cost of Good Sold'
        ]);

        $type->accounts()->create([
        	'code' => '50002',
        	'name' => 'Advertising Expenses'
        ]);

        $type->accounts()->create([
        	'code' => '50003',
        	'name' => 'Bank Fees'
        ]);

        $type->accounts()->create([
        	'code' => '50004',
        	'name' => 'Payroll Tax Expenses'
        ]);

        $type->accounts()->create([
        	'code' => '50005',
        	'name' => 'Depreciation Expenses'
        ]);

        $type->accounts()->create([
        	'code' => '50006',
        	'name' => 'Rent Expenses'
        ]);

        $type->accounts()->create([
        	'code' => '50007',
        	'name' => 'Supplies Expenses'
        ]);

        $type->accounts()->create([
        	'code' => '50008',
        	'name' => 'Utilities Expenses'
        ]);

        $type->accounts()->create([
        	'code' => '50009',
        	'name' => 'Miscellaneous'
        ]);
    }
}
