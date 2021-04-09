<?php

namespace App\Http\Livewire\Employee;

use App\Http\Livewire\CustomComponent;

use App\Models\User;
use App\Models\Employee;
use App\Models\Profile;
use App\Models\CompanyRole;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Create extends CustomComponent
{
	public $company_id;
	public $inputs = [
		'first_name',
		'middle_name',
		'last_name',
		'username',
		'email',
		'password',
		'role'
	];
	public $roles;

	public $listeners = [
        'refreshSelf' => '$refresh'
    ];

	public function mount($company_id)
	{
		$this->company_id = $company_id;
		$this->roles = CompanyRole::getCompanyRoles($this->company_id);
	}

	public function submit()
	{
		Validator::make($this->inputs, [
            'first_name'   => ['required', 'string', 'max:255'],
            'middle_name'  => ['nullable', 'string', 'max:255'],
            'last_name'    => ['required', 'string', 'max:255'],
            'username'     => ['nullable', 'string', 'max:255'],
            'email'        => ['required', 'email', 'unique:users,email'],
            'password'     => ['required', 'min:6'],
            'role'         => ['required']
        ])->validate();

		try {
			DB::beginTransaction();

			$user = User::create([
				'email'     => $this->inputs['email'],
            	'password'  => bcrypt($this->inputs['password'])
			]);

			$profile = Profile::create([
				'user_id'      => $user->id,
				'first_name'   => $this->inputs['first_name'],
	            'middle_name'  => $this->inputs['middle_name'] ?? null,
	            'last_name'    => $this->inputs['last_name'],
	            'username'     => $this->inputs['username'] ?? null,
			]);

			Employee::create([
				'user_id'    => $user->id,
				'company_id' => $this->company_id,
				'role_id'    => $this->inputs['role'],
				'created_by' => auth()->id(),
				'updated_by' => auth()->id(),
			]);
			DB::commit();

			$this->inputs = [];

			$this->message('Employee has been created', 'success');
		} catch (\Exception $e) {
			DB::rollback();
			$this->message($e->getMessage(), 'error');
		}
	}

    public function render()
    {
        return view('livewire.employee.create');
    }
}
