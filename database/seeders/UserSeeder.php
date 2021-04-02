<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Employee;
use App\Models\CompanyRole;

use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = CompanyRole::where('company_id', 1)->get();

        foreach ($company as $role) {
            
            if ( $role->role_name == "owner" ) {
                $user = User::create([
                    'first_name' => 'John Rexter',
                    'last_name'  => 'Flores',
                    'email'      => 'john@test.com',
                    'password'   => bcrypt('password'),
                    'status'     => 'active'
                ]);

                Employee::create([
                    'user_id'    => $user->id,
                    'role_id'    => $role->id,
                    'company_id' => 1
                ]);
            }

            if ( $role->role_name == "accountant" ) {
                $user = User::create([
                    'first_name' => 'Rojennette Ann',
                    'last_name'  => 'Alivio',
                    'email'      => 'roj@test.com',
                    'password'   => bcrypt('password'),
                    'status'     => 'active'
                ]);

                Employee::create([
                    'user_id'    => $user->id,
                    'role_id'    => $role->id,
                    'company_id' => 1
                ]);

                $user->givePermissionTo('role.view');
                $user->givePermissionTo('role.update');
                $user->givePermissionTo('company.view');
                $user->givePermissionTo('company.update');
            }
        }

        User::create([
        	'first_name' => 'Dave Scott',
            'last_name'  => 'Wong',
        	'email'      => 'dave@test.com',
        	'password'   => bcrypt('password')
        ]);
    }
}
