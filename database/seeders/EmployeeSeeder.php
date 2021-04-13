<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Company;
use App\Models\CompanyRole;
use App\Models\User;
use App\Models\Profile;
use App\Models\Contact;
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

        foreach ($companies as $company) {

            $roles = CompanyRole::where('role_name', 'not like', 'owner')
                            ->where('company_id', $company->id)
                            ->get();

        	foreach ($roles as $role) {
        		$user = User::factory(1)->create([
                    'company_id' => $company->id,
                ]);

                $user[0]->setting()->create([
                    'user_id' => $user[0]->id,
                    'is_dark' => false
                ]);

                $profile = Profile::factory(1)->create([
                    'user_id' => $user[0]->id
                ]);

                Contact::factory(1)->create([
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
