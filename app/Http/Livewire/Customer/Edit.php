<?php

namespace App\Http\Livewire\Customer;

use App\Http\Livewire\CustomComponent;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Profile;
use App\Models\Customer;
use App\Models\Status;

class Edit extends CustomComponent
{
	public $company_id;
	public $customer;

	public $inputs = [];

	public $statuses = [];

	public $listeners = ['refreshSelf' => '$refresh'];

	public function mount()
	{
		$this->statuses = Status::all();

		$this->init($this->customer);
	}

	public function init($customer)
	{
		$this->inputs = [
			'first_name'       => $customer->user->profile->first_name ?? null,
			'last_name'        => $customer->user->profile->last_name ?? null,
			'phone'            => $customer->user->profile->phone_number ?? null,
			'email'            => $customer->user->email ?? null,
			'status'           => $customer->status_id,
			'company'          => $customer->user->profile->company ?? null,
			'position'         => $customer->user->profile->position ?? null,
			'telephone'        => $customer->user->profile->telephone ?? null,
			'fax'              => $customer->user->profile->fax ?? null,
			'country'          => $customer->user->profile->country ?? null,
			'state'            => $customer->user->profile->state ?? null,
			'city'             => $customer->user->profile->city ?? null,
			'address_line_2'   => $customer->user->profile->address_line_2 ?? null,
			'address_line_1'   => $customer->user->profile->address_line_1 ?? null,
			'postal'           => $customer->user->profile->postal ?? null,
			'twitter'          => $customer->user->profile->twitter ?? null,
			'facebook'         => $customer->user->profile->facebook ?? null,
			'instagram'        => $customer->user->profile->instagram ?? null,
			'linkedin'         => $customer->user->profile->linkedin ?? null,
			'pinterest'        => $customer->user->profile->pinterest ?? null,
			'youtube'          => $customer->user->profile->youtube ?? null,
		];
	}

	public function submit()
	{
		Validator::make($this->inputs, [
            'first_name'     => ['required', 'string', 'max:255'],
            'last_name'      => ['required', 'string', 'max:255'],
            'phone'          => ['required'],
            'email'          => ['required', Rule::unique('users')->ignore($this->customer->user->id)],
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
	        'status'         => ['required', 'numeric'],
        ])->validate();

        try {
			$user = User::find($this->customer->user->id);

			$user->fill([
				'email'      => $this->inputs['email']
			]);

			$user->save();

			$profile = Profile::find($this->customer->user->profile->id);

			$profile->fill([
				'first_name'     => ucwords($this->inputs['first_name']),
				'last_name'      => ucwords($this->inputs['last_name']),
				'phone_number'   => $this->inputs['phone'],
				'company'        => ucwords($this->inputs['company']) ?? null,
				'position'       => ucwords($this->inputs['position']) ?? null,
				'telephone'      => $this->inputs['telephone'] ?? null,
				'fax'            => $this->inputs['fax'] ?? null,
				'address_line_1' => ucwords($this->inputs['address_line_1']),
				'address_line_2' => ucwords($this->inputs['address_line_2']) ?? null,
				'city'           => ucwords($this->inputs['city']),
				'state'          => ucwords($this->inputs['state']),
				'postal'         => $this->inputs['postal'],
				'country'        => ucwords($this->inputs['country']) ?? null,
				'facebook'       => $this->inputs['facebook'] ?? null,
		        'instagram'      => $this->inputs['instagram'] ?? null,
		        'linkedin'       => $this->inputs['linkedin'] ?? null,
		        'youtube'        => $this->inputs['youtube'] ?? null,
		        'twitter'        => $this->inputs['twitter'] ?? null,
		        'pinterest'      => $this->inputs['pinterest'] ?? null,
			]);

			$profile->save();

			$customer = Customer::find($this->customer->id);

			$customer->fill([
				'updated_by' => auth()->id(),
				'status_id'  => $this->inputs['status'],
			]);

			$customer->save();

			$this->init($customer);

			$this->message('Customer has been updated.', 'success');
		} catch(\Exception $e) {
			DB::rollback();
			$this->message($e->getMessage(), 'error');
		}
	}

    public function render()
    {
        return view('livewire.customer.edit');
    }
}
