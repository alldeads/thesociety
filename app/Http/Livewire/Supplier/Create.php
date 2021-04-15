<?php

namespace App\Http\Livewire\Supplier;

use App\Http\Livewire\CustomComponent;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Profile;
use App\Models\Supplier;
use App\Models\Status;

class Create extends CustomComponent
{
	public $company_id;

	public $inputs = [];

	public $statuses = [];

	public function mount()
	{
		$this->statuses = Status::all();
	}

	public function submit()
	{
		Validator::make($this->inputs, [
            'first_name'     => ['nullable', 'string', 'max:255'],
            'last_name'      => ['nullable', 'string', 'max:255'],
            'phone'          => ['nullable'],
            'contact_phone'  => ['nullable'],
            'contact_email'  => ['nullable', 'email'],
            'email'          => ['required', 'email', 'unique:users'],
            'company'        => ['required', 'string'],
            'position'       => ['nullable', 'string'],
            'telephone'      => ['nullable', 'string'],
            'address_line_1' => ['required', 'string'],
			'address_line_2' => ['nullable', 'string'],
			'city'           => ['required', 'string'],
			'state'          => ['required', 'string'],
			'postal'         => ['required', 'string'],
			'country'        => ['required', 'string'],
	        'status'         => ['required', 'numeric'],
        ])->validate();

        try {

        	DB::beginTransaction();

			$user = User::create([
				'email'      => $this->inputs['email'],
				'company_id' => $this->company_id,
				'password'   => bcrypt(time())
			]);

			$profile = Profile::create([
				'user_id'        => $user->id,
				'first_name'     => ucwords($this->inputs['first_name'] ?? null),
				'last_name'      => ucwords($this->inputs['last_name'] ?? null),
				'phone_number'   => $this->inputs['phone'] ?? null,
				'company'        => ucwords($this->inputs['company']),
				'position'       => ucwords($this->inputs['position'] ?? null),
				'telephone'      => $this->inputs['telephone'] ?? null,
				'address_line_1' => ucwords($this->inputs['address_line_1']),
				'address_line_2' => ucwords($this->inputs['address_line_2'] ?? null),
				'city'           => ucwords($this->inputs['city']),
				'state'          => ucwords($this->inputs['state']),
				'postal'         => $this->inputs['postal'],
				'country'        => ucwords($this->inputs['country'] ?? null)
			]);

			$supplier = Supplier::create([
				'user_id'    => $user->id,
				'company_id' => $this->company_id,
				'phone'      => $this->inputs['contact_phone'] ?? null,
            	'email'      => $this->inputs['contact_email'] ?? null,
				'created_by' => auth()->id(),
				'updated_by' => auth()->id(),
				'status_id'  => $this->inputs['status'],
			]);

			DB::commit();

			$this->inputs = [];

			$this->message('Supplier has been created', 'success');
		} catch(\Exception $e) {
			DB::rollback();
			$this->message($e->getMessage(), 'error');
		}
	}

    public function render()
    {
        return view('livewire.supplier.create');
    }
}
