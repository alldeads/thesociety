<?php

namespace App\Http\Livewire\Customer;

use App\Http\Livewire\CustomComponent;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Profile;
use App\Models\Customer;

class Create extends CustomComponent
{
	public $company_id;

	public $inputs = [];

	public function submit()
	{
		Validator::make($this->inputs, [
            'first_name'     => ['required', 'string', 'max:255'],
            'last_name'      => ['required', 'string', 'max:255'],
            'phone'          => ['required'],
            'email'          => ['required', 'unique:users'],
            'company'        => ['nullable', 'string'],
            'position'       => ['nullable', 'string'],
            'telephone'      => ['nullable', 'string'],
            'fax'            => ['nullable', 'string'],
            'address_line_1' => ['required', 'string'],
			'address_line_2' => ['nullable', 'string'],
			'city'           => ['required', 'string'],
			'state'          => ['required', 'string'],
			'postal'         => ['required', 'string'],
			'country'        => ['required', 'string'],
			'facebook'       => ['nullable', 'url'],
	        'instagram'      => ['nullable', 'url'],
	        'linkedin'       => ['nullable', 'url'],
	        'youtube'        => ['nullable', 'url'],
	        'twitter'        => ['nullable', 'url'],
	        'pinterest'      => ['nullable', 'url'],
	        'status'         => ['required', 'string'],
        ])->validate();

		try {
			$user = User::create([
				'email'      => $this->inputs['email'],
				'company_id' => $this->company_id,
				'password'   => bcrypt(time())
			]);

			$profile = Profile::create([
				'user_id'        => $user->id,
				'first_name'     => $this->inputs['first_name'],
				'last_name'      => $this->inputs['last_name'],
				'phone_number'   => $this->inputs['phone'],
				'company'        => $this->inputs['company'] ?? null,
				'position'       => $this->inputs['position'] ?? null,
				'telephone'      => $this->inputs['telephone'] ?? null,
				'fax'            => $this->inputs['fax'] ?? null,
				'address_line_1' => $this->inputs['address_line_1'],
				'address_line_2' => $this->inputs['address_line_2'] ?? null,
				'city'           => $this->inputs['city'],
				'state'          => $this->inputs['state'],
				'postal'         => $this->inputs['postal'],
				'country'        => $this->inputs['country'] ?? null,
				'facebook'       => $this->inputs['facebook'] ?? null,
		        'instagram'      => $this->inputs['instagram'] ?? null,
		        'linkedin'       => $this->inputs['linkedin'] ?? null,
		        'youtube'        => $this->inputs['youtube'] ?? null,
		        'twitter'        => $this->inputs['twitter'] ?? null,
		        'pinterest'      => $this->inputs['pinterest'] ?? null,
		        'status'         => $this->inputs['status'],
			]);

			$customer = Customer::create([
				'user_id'    => $user->id,
				'company_id' => $this->company_id,
				'created_by' => auth()->id(),
				'updated_by' => auth()->id(),
			]);

			$this->inputs = [];

			$this->message('Customer has been created', 'success');
		} catch(\Exception $e) {
			DB::rollback();
			$this->message($e->getMessage(), 'error');
		}
	}

    public function render()
    {
        return view('livewire.customer.create');
    }
}
