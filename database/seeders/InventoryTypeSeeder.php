<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\InventoryType;

class InventoryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InventoryType::create([
            'name' => 'Transfer Order',
            'abbr' => 'to'
        ]);

        InventoryType::create([
            'name' => 'Items Received',
            'abbr' => 'ir'
        ]);

        InventoryType::create([
            'name' => 'Inventory Count',
            'abbr' => 'ic'
        ]);

        InventoryType::create([
            'name' => 'Damage',
            'abbr' => 'dg'
        ]);

        InventoryType::create([
            'name' => 'Loss',
            'abbr' => 'ls'
        ]);

        InventoryType::create([
            'name' => 'Manually Removed',
            'abbr' => 'mr'
        ]);
    }
}
