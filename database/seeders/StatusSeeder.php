<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
        	'name'  => 'new',
        	'color' => 'success'
        ]);

        Status::create([
        	'name'  => 'prospect',
        	'color' => 'info'
        ]);

        Status::create([
        	'name'  => 'expired',
        	'color' => 'danger'
        ]);

        Status::create([
        	'name'  => 'suspended',
        	'color' => 'warning'
        ]);

        Status::create([
        	'name'  => 'active',
        	'color' => 'primary'
        ]);

        Status::create([
        	'name'  => 'inactive',
        	'color' => 'secondary'
        ]);
    }
}
