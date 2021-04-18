<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Company;
use App\Models\Customer;
use App\Models\User;
use App\Models\Profile;
use App\Models\Contact;
use App\Models\Status;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = Company::all();
        $statuses  = Status::where('is_customer', true)->get();

        foreach ($companies as $company) {
        	for ( $i = 0; $i < rand(10,20); $i++) { 
        		$user = User::factory(1)->create([
        			'company_id' => $company->id,
        		]);

	            $profile = Profile::factory(1)->create([
	                'user_id' => $user[0]->id
	            ]);

	            Customer::create([
	    			'company_id' => $company->id,
	    			'user_id'    => $user[0]->id,
	                'updated_by' => 1,
	                'created_by' => 1,
	                'status_id'  => $statuses->random(1)->first()->id
	    		]);
        	}
        }
    }
}
