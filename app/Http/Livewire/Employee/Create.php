<?php

namespace App\Http\Livewire\Employee;

use App\Http\Livewire\CustomComponent;

use App\Models\User;
use App\Models\Employee;
use App\Models\Profile;
use App\Models\Contact;
use App\Models\CompanyRole;
use App\Models\CompanyMenu;

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
		'role',
		'permissions',
		'birth_date',
		'phone_number',
		'gender',
		'marital_status',
		'date_hired',
		'nationality',
		'address_line_1',
		'address_line_2',
		'city',
		'state',
		'postal',
		'country',
		'sss',
        'pagibig',
        'philhealth',
        'tin',
        'contact_name',
        'contact_phone',
        'contact_relationship',
	];

	public $roles;
	public $menus;

	public function mount($company_id)
	{
		$this->company_id = $company_id;
		$this->roles = CompanyRole::getCompanyRoles($this->company_id);
		$this->menus = CompanyMenu::getCompanyMenus($this->company_id);
	}

	public function submit()
	{
		Validator::make($this->inputs, [
            'first_name'     => ['required', 'string', 'max:255'],
            'middle_name'    => ['nullable', 'string', 'max:255'],
            'last_name'      => ['required', 'string', 'max:255'],
            'username'       => ['nullable', 'string', 'max:255'],
            'email'          => ['required', 'email', 'unique:users,email'],
            'password'       => ['required', 'min:6'],
            'permissions'    => ['required'],
            'role'           => ['required', 'numeric'],
            'birth_date'     => ['required', 'date'],
            'phone_number'   => ['required'],
            'gender'         => ['required', 'string'],
            'marital_status' => ['required', 'string'],
            'date_hired'     => ['nullable', 'date'],
            'nationality'    => ['required', 'string'],
            'address_line_1' => ['required', 'string'],
			'address_line_2' => ['nullable', 'string'],
			'city'           => ['required', 'string'],
			'state'          => ['required', 'string'],
			'postal'         => ['required', 'string'],
			'country'        => ['required', 'string'],
			'sss'            => ['required', 'string'],
	        'pagibig'        => ['required', 'string'],
	        'philhealth'     => ['required', 'string'],
	        'tin'            => ['required', 'string'],
	        'contact_name'   => ['required', 'string'],
			'contact_phone'   => ['required', 'string'],
			'contact_relationship'  => ['required', 'string'],
        ])->validate();

		try {
			DB::beginTransaction();

			$user = User::create([
				'email'     => $this->inputs['email'],
            	'password'  => bcrypt($this->inputs['password'])
			]);

			$profile = Profile::create([
				'user_id'        => $user->id,
				'first_name'     => $this->inputs['first_name'],
	            'middle_name'    => $this->inputs['middle_name'] ?? null,
	            'last_name'      => $this->inputs['last_name'],
	            'birth_date'     => $this->inputs['birth_date'],
	            'phone_number'   => $this->inputs['phone_number'],
	            'gender'         => $this->inputs['gender'],
	            'marital_status' => $this->inputs['marital_status'],
	            'nationality'    => $this->inputs['nationality'],
	            'address_line_1' => $this->inputs['address_line_1'],
				'address_line_2' => $this->inputs['address_line_2'] ?? null,
				'city'           => $this->inputs['city'],
				'state'          => $this->inputs['state'],
				'postal'         => $this->inputs['postal'],
				'country'        => $this->inputs['country'],
				'sss'            => $this->inputs['sss'],
		        'pagibig'        => $this->inputs['pagibig'],
		        'philhealth'     => $this->inputs['philhealth'],
		        'tin'            => $this->inputs['tin'],
			]);

			Employee::create([
				'user_id'    => $user->id,
				'company_id' => $this->company_id,
				'role_id'    => $this->inputs['role'],
				'date_hired' => $this->inputs['date_hired'] ?? null,
				'created_by' => auth()->id(),
				'updated_by' => auth()->id(),
			]);

			Contact::create([
				'user_id'      => $user->id,
				'name'         => $this->inputs['contact_name'],
				'phone'        => $this->inputs['contact_phone'],
				'relationship' => $this->inputs['contact_relationship'],
			]);

			foreach ($this->inputs['permissions'] as $key => $permission) {
				foreach ($this->menus as $menu) {
					if ( strrpos($key, $menu->menu->base) !== false ) {
						$user->givePermissionTo(str_replace('-', '.', $key));
					}
				}
			}

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
