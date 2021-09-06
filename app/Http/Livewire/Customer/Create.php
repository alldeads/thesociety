<?php

namespace App\Http\Livewire\Customer;

use App\Http\Livewire\CustomComponent;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Profile;
use App\Models\Customer;
use App\Models\Status;

class Create extends CustomComponent
{
	public $company_id;

	public $inputs = [];

	public $statuses = [];

	public function mount()
	{
		$this->statuses = Status::where('is_customer', true)->get();
	}

	public function submit()
	{
		Validator::make($this->inputs, [
            'first_name'     => ['required', 'string', 'max:255'],
            'last_name'      => ['required', 'string', 'max:255'],
            'phone'          => ['required'],
            'email'          => ['required', 'email', 'unique:users'],
            'company'        => ['nullable', 'string'],
            'position'       => ['nullable', 'string'],
            'telephone'      => ['nullable', 'string'],
            'fax'            => ['nullable', 'string'],
            'address_line_1' => ['nullable', 'string'],
			'address_line_2' => ['nullable', 'string'],
			'city'           => ['nullable', 'string'],
			'state'          => ['nullable', 'string'],
			'postal'         => ['nullable', 'string'],
			'country'        => ['nullable', 'string'],
			'facebook'       => ['nullable', 'url'],
	        'instagram'      => ['nullable', 'url'],
	        'linkedin'       => ['nullable', 'url'],
	        'youtube'        => ['nullable', 'url'],
	        'twitter'        => ['nullable', 'url'],
	        'pinterest'      => ['nullable', 'url'],
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
				'first_name'     => ucwords($this->inputs['first_name']),
				'last_name'      => ucwords($this->inputs['last_name']),
				'phone_number'   => $this->inputs['phone'],
				'company'        => ucwords($this->inputs['company'] ?? null),
				'position'       => ucwords($this->inputs['position'] ?? null),
				'telephone'      => $this->inputs['telephone'] ?? null,
				'fax'            => $this->inputs['fax'] ?? null,
				'address_line_1' => ucwords($this->inputs['address_line_1'] ?? null),
				'address_line_2' => ucwords($this->inputs['address_line_2'] ?? null),
				'city'           => ucwords($this->inputs['city'] ?? null),
				'state'          => ucwords($this->inputs['state'] ?? null),
				'postal'         => $this->inputs['postal'] ?? null,
				'country'        => ucwords($this->inputs['country'] ?? null),
				'facebook'       => $this->inputs['facebook'] ?? null,
		        'instagram'      => $this->inputs['instagram'] ?? null,
		        'linkedin'       => $this->inputs['linkedin'] ?? null,
		        'youtube'        => $this->inputs['youtube'] ?? null,
		        'twitter'        => $this->inputs['twitter'] ?? null,
		        'pinterest'      => $this->inputs['pinterest'] ?? null,
			]);

			$customer = Customer::create([
				'user_id'    => $user->id,
				'company_id' => $this->company_id,
				'created_by' => auth()->id(),
				'updated_by' => auth()->id(),
				'status_id'  => $this->inputs['status'],
			]);

			DB::commit();

			cache()->forget('app-company-users');

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
