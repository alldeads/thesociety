<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Menu;
use App\Models\Company;
use App\Models\CompanyMenu;

class CompanyMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus     = Menu::all();
        $companies = Company::all();

        foreach ($companies as $company) {
        	foreach ($menus as $menu) {
        		CompanyMenu::create([
	        		'company_id' => $company->id,
	        		'menu_id'    => $menu->id
	        	]);
        	}
        }
    }
}
