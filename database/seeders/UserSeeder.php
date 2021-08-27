<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Profile;
use App\Models\Employee;
use App\Models\CompanyRole;
use Spatie\Permission\Models\Permission;

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
                    'company_id' => 1,
                    'email'      => 'john@test.com',
                    'password'   => bcrypt('password'),
                    'status'     => 'active'
                ]);

                $user->setting()->create([
                    'user_id' => $user->id,
                    'is_dark' => false
                ]);

                $profile = Profile::factory(1)->create([
                    'user_id'    => $user->id,
                    'first_name' => 'John Rexter',
                    'last_name'  => 'Flores',
                ]);

                Employee::create([
                    'user_id'    => $user->id,
                    'role_id'    => $role->id,
                    'is_owner'   => true,
                    'company_id' => 1
                ]);

                $permissions = Permission::all();

                foreach ($permissions as $permission) {
                    $user->givePermissionTo($permission);
                }
            }

            if ( $role->role_name == "accountant" ) {
                $user = User::create([
                    'company_id' => 1,
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
                    'is_owner'   => true,
                    'company_id' => 1
                ]);

                $user->setting()->create([
                    'user_id' => $user->id,
                    'is_dark' => true
                ]);

                $user->givePermissionTo('dashboard.view');
                $user->givePermissionTo('employee.view');
                $user->givePermissionTo('employee.export');
                $user->givePermissionTo('employee.update');
                $user->givePermissionTo('role.view');
                $user->givePermissionTo('role.update');
                $user->givePermissionTo('company.view');
                $user->givePermissionTo('company.update');
                $user->givePermissionTo('cashflow.view');
                $user->givePermissionTo('cashflow.create');
                $user->givePermissionTo('cashflow.export');
            }
        }
    }
}
