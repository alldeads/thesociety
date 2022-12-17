<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ChartType;

class ChartTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ChartType::create([
            'name'  => 'Assets',
            'color' => 'success'
        ]);

        ChartType::create([
            'name'  => 'Liabilities',
            'color' => 'warning'
        ]);

        ChartType::create([
            'name'  => 'Equity',
            'color' => 'primary'
        ]);

        ChartType::create([
            'name'  => 'Income',
            'color' => 'info'
        ]);

        ChartType::create([
            'name'  => 'Expenses',
            'color' => 'danger'
        ]);
    }
}
