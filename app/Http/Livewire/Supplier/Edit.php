<?php

namespace App\Http\Livewire\Supplier;

use App\Http\Livewire\CustomComponent;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Profile;
use App\Models\supplier;
use App\Models\Status;

class Edit extends CustomComponent
{
	public $company_id;
	public $supplier;

	public $inputs = [];

	public $statuses = [];

	public function mount()
	{
		$this->statuses = Status::where('is_supplier', true)->get();

		$this->init($this->supplier);
	}

	public function submit()
	{
		Validator::make($this->inputs, [
            'first_name'     => ['nullable', 'string', 'max:255'],
            'last_name'      => ['nullable', 'string', 'max:255'],
            'phone'          => ['nullable'],
            'contact_phone'  => ['nullable'],
            'contact_email'  => ['nullable', 'email'],
            'email'          => ['required', 'email', Rule::unique('users')->ignore($this->supplier->user->id)],
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

			$user = User::find($this->supplier->user->id);

			$user->fill([
				'email' => $this->inputs['email']
			]);

			$user->save();

			$profile = Profile::find($this->supplier->user->profile->id);

			$profile->fill([
				'first_name'     => ucwords($this->inputs['first_name']),
				'last_name'      => ucwords($this->inputs['last_name']),
				'phone_number'   => $this->inputs['phone'],
				'company'        => ucwords($this->inputs['company']),
				'position'       => ucwords($this->inputs['position']),
				'telephone'      => $this->inputs['telephone'],
				'address_line_1' => ucwords($this->inputs['address_line_1']),
				'address_line_2' => ucwords($this->inputs['address_line_2']),
				'city'           => ucwords($this->inputs['city']),
				'state'          => ucwords($this->inputs['state']),
				'postal'         => $this->inputs['postal'],
				'country'        => ucwords($this->inputs['country'])
			]);

			$profile->save();

			$supplier = Supplier::find($this->supplier->id);

			$supplier->fill([
				'updated_by' => auth()->id(),
				'email'      => $this->inputs['contact_email'],
				'phone'      => $this->inputs['contact_phone'],
				'status_id'  => $this->inputs['status'],
			]);

			$supplier->save();

			DB::commit();

			$this->init($supplier);

			$this->message('Supplier has been updated.', 'success');
		} catch(\Exception $e) {
			DB::rollback();
			$this->message($e->getMessage(), 'error');
		}

	}

	public function init($supplier)
	{
		$this->inputs = [
			'first_name'       => $supplier->user->profile->first_name ?? null,
			'last_name'        => $supplier->user->profile->last_name ?? null,
			'phone'            => $supplier->user->profile->phone_number ?? null,
			'email'            => $supplier->user->email ?? null,
			'status'           => $supplier->status_id,
			'company'          => $supplier->user->profile->company ?? null,
			'position'         => $supplier->user->profile->position ?? null,
			'telephone'        => $supplier->user->profile->telephone ?? null,
			'country'          => $supplier->user->profile->country ?? null,
			'state'            => $supplier->user->profile->state ?? null,
			'city'             => $supplier->user->profile->city ?? null,
			'address_line_2'   => $supplier->user->profile->address_line_2 ?? null,
			'address_line_1'   => $supplier->user->profile->address_line_1 ?? null,
			'postal'           => $supplier->user->profile->postal ?? null,
			'contact_phone'    => $supplier->phone ?? null,
			'contact_email'    => $supplier->email ?? null,
		];
	}

    public function render()
    {
        return view('livewire.supplier.edit');
    }
}
