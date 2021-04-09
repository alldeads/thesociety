<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Profile;
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
                    'email'      => 'john@test.com',
                    'password'   => bcrypt('password'),
                    'status'     => 'active'
                ]);

                $profile = Profile::factory(1)->create([
                    'user_id'    => $user->id,
                    'first_name' => 'John Rexter',
                    'last_name'  => 'Flores',
                ]);

                Employee::create([
                    'user_id'    => $user->id,
                    'role_id'    => $role->id,
                    'company_id' => 1
                ]);

                $user->givePermissionTo('dashboard.view');
                $user->givePermissionTo('employee.view');
                $user->givePermissionTo('employee.create');
                $user->givePermissionTo('employee.export');
                $user->givePermissionTo('employee.update');
                $user->givePermissionTo('role.view');
                $user->givePermissionTo('role.update');
                $user->givePermissionTo('company.view');
                $user->givePermissionTo('company.update');
            }

            if ( $role->role_name == "accountant" ) {
                $user = User::create([
                    'email'      => 'roj@test.com',
                    'password'   => bcrypt('password'),
                    'status'     => 'active'
                ]);

                $profile = Profile::factory(1)->create([
                    'user_id'    => $user->id,
                    'first_name' => 'Rojennette Ann',
                    'last_name'  => 'Alivio',
                ]);

                Employee::create([
                    'user_id'    => $user->id,
                    'role_id'    => $role->id,
                    'company_id' => 1
                ]);

                $user->givePermissionTo('dashboard.view');
                $user->givePermissionTo('employee.view');
                $user->givePermissionTo('employee.export');
                $user->givePermissionTo('employee.update');
                $user->givePermissionTo('role.view');
                $user->givePermissionTo('role.update');
                $user->givePermissionTo('company.view');
                $user->givePermissionTo('company.update');
            }

            if ( $role->role_name == "owner" ) {
                $user = User::create([
                    'email'      => 'wong@test.com',
                    'password'   => bcrypt('password')
                ]);

                $profile = Profile::factory(1)->create([
                    'user_id'    => $user->id,
                    'first_name' => 'Dave Scott',
                    'last_name'  => 'Wong',
                ]);

                Employee::create([
                    'user_id'    => $user->id,
                    'role_id'    => $role->id,
                    'company_id' => 1
                ]);

                $user->givePermissionTo('dashboard.view');
                $user->givePermissionTo('employee.view');
                $user->givePermissionTo('role.view');
                $user->givePermissionTo('company.view');
            }
        }
    }
}
