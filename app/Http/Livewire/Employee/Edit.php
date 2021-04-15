<?php

namespace App\Http\Livewire\Employee;

use App\Http\Livewire\CustomComponent;

use App\Models\User;
use App\Models\Employee;
use App\Models\Profile;
use App\Models\Contact;
use App\Models\CompanyRole;
use App\Models\CompanyMenu;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Edit extends CustomComponent
{
	public $company_id;

	public $inputs = [
		'permissions',
		'password'
	];

	public $roles;
	public $menus;
	public $employee;

	public function mount($company_id, $employee)
	{
		$this->company_id = $company_id;
		$this->employee   = $employee;
		$this->roles = CompanyRole::getCompanyRoles($this->company_id);
		$this->menus = CompanyMenu::getCompanyMenus($this->company_id);

		$this->inputs = [
			'first_name'        => $employee->user->profile->first_name ?? '',
			'permissions'       => [],
			'middle_name'       => $employee->user->profile->middle_name ?? '',
			'last_name'         => $employee->user->profile->last_name ?? '',
			'email'             => $employee->user->email ?? '',
			'role'              => $employee->role_id ?? '',
			'birth_date'        => $employee->user->profile->birth_date ?? '',
			'phone_number'      => $employee->user->profile->phone_number ?? '',
			'gender'            => $employee->user->profile->gender ?? '',
			'marital_status'    => $employee->user->profile->marital_status ?? '',
			'date_hired'        => $employee->date_hired ?? null,
			'nationality'       => $employee->user->profile->nationality ?? '',
			'address_line_1'    => $employee->user->profile->address_line_1 ?? '',
			'address_line_2'    => $employee->user->profile->address_line_2 ?? '',
			'city'              => $employee->user->profile->city ?? '',
			'state'             => $employee->user->profile->state ?? '',
			'postal'            => $employee->user->profile->postal ?? '',
			'country'           => $employee->user->profile->country ?? '',
			'sss'               => $employee->user->profile->sss ?? '',
	        'pagibig'           => $employee->user->profile->pagibig ?? '',
	        'philhealth'        => $employee->user->profile->philhealth ?? '',
	        'tin'               => $employee->user->profile->tin ?? '',
	        'contact_name'      => $employee->user->contact->name ?? '',
	        'contact_phone'     => $employee->user->contact->phone ?? '',
	        'contact_relationship' => $employee->user->contact->relationship ?? '',
		];

		foreach ($employee->user->permissions()->pluck('name') as $pem) {
			$plain = str_replace('.', '-', $pem);

			$this->inputs['permissions'][$plain] = true;
		}
	}

	public function submit()
	{
		Validator::make($this->inputs, [
            'first_name'     => ['required', 'string', 'max:255'],
            'middle_name'    => ['nullable', 'string', 'max:255'],
            'last_name'      => ['required', 'string', 'max:255'],
            'email'          => ['required', 'email', Rule::unique('users')->ignore($this->employee->user->id)],
            'password'       => ['nullable', 'min:6'],
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

			$user = User::find($this->employee->user->id);

			$user->email = $this->inputs['email'];

			if ( isset($this->inputs['password']) ) {
				$user->password = bcrypt($this->inputs['password']);
			}
			
			$user->save();

			$profile = Profile::find($this->employee->user->profile->id);

			$profile->fill([
				'first_name'     => $this->inputs['first_name'],
	            'middle_name'    => $this->inputs['middle_name'] ?? null,
	            'last_name'      => $this->inputs['last_name'],
	            'username'       => $this->inputs['username'] ?? null,
	            'username'       => $this->inputs['username'] ?? null,
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

			$profile->save();

			$employee = Employee::find($this->employee->id);

			$employee->fill([
				'role_id'    => $this->inputs['role'],
				'date_hired' => $this->inputs['date_hired'] ?? null,
				'updated_by' => auth()->id(),
			]);

			$employee->save();

			$contact = Contact::find($this->employee->user->contact->id);

			$contact->fill([
				'name'         => $this->inputs['contact_name'],
				'phone'        => $this->inputs['contact_phone'],
				'relationship' => $this->inputs['contact_relationship'],
			]);

			$contact->save();

			$p = [];

			foreach ($this->inputs['permissions'] as $key => $permission) {
				foreach ($this->menus as $menu) {
					if ( strrpos($key, $menu->menu->base) !== false ) {
						$plain = str_replace('-', '.', $key);

						if ( $permission ) {
							$p[$plain] = $plain;
							$user->givePermissionTo($plain);
						}
					}
				}
			}

			foreach ($user->permissions as $u) {
				if ( !isset($p[$u->name]) ) {
					$user->revokePermissionTo($u->name);
				}
			}

			DB::commit();

			$this->message('Employee has been updated', 'success');
		} catch (\Exception $e) {
			DB::rollback();
			$this->message($e->getMessage(), 'error');
		}
	}

    public function render()
    {
        return view('livewire.employee.edit');
    }
}
