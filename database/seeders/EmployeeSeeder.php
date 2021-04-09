<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Company;
use App\Models\CompanyRole;
use App\Models\User;
use App\Models\Profile;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = Company::all();
        $roles = CompanyRole::where('role_name', 'not like', 'owner')->get();

        foreach ($companies as $company) {
        	foreach ($roles as $role) {
        		$user = User::factory(1)->create();

                $profile = Profile::factory(1)->create([
                    'user_id' => $user[0]->id
                ]);

        		Employee::create([
        			'company_id' => $company->id,
        			'user_id' => $user[0]->id,
        			'role_id' => $role->id,
                    'updated_by' => 1,
                    'created_by' => 1
        		]);
        	}
        }
    }
}
