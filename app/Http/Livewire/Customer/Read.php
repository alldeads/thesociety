<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class Read extends Component
{
	public $customer;

	public $inputs;

	public function mount()
	{
		$this->inputs = [
			'first_name'       => ucwords($this->customer->user->profile->first_name) ?? '',
			'last_name'        => ucwords($this->customer->user->profile->last_name) ?? '',
			'phone'            => $this->customer->user->profile->phone_number ?? '',
			'email'            => $this->customer->user->email ?? '',
			'status'           => ucwords($this->customer->status->name) ?? '',
			'company'          => ucwords($this->customer->user->profile->company) ?? '',
			'position'         => ucwords($this->customer->user->profile->position) ?? '',
			'telephone'        => $this->customer->user->profile->telephone ?? '',
			'fax'              => $this->customer->user->profile->fax ?? '',
			'country'          => ucwords($this->customer->user->profile->country) ?? '',
			'state'            => ucwords($this->customer->user->profile->state) ?? '',
			'city'             => ucwords($this->customer->user->profile->city) ?? '',
			'address_line_2'   => ucwords($this->customer->user->profile->address_line_2) ?? '',
			'address_line_1'   => ucwords($this->customer->user->profile->address_line_1) ?? '',
			'postal'           => $this->customer->user->profile->postal ?? '',
			'twitter'          => $this->customer->user->profile->twitter ?? '',
			'facebook'         => $this->customer->user->profile->facebook ?? '',
			'instagram'        => $this->customer->user->profile->instagram ?? '',
			'linkedin'         => $this->customer->user->profile->linkedin ?? '',
			'pinterest'        => $this->customer->user->profile->pinterest ?? '',
			'youtube'          => $this->customer->user->profile->youtube ?? '',
			'created_at'       => $this->customer->created_at->format('F, j Y h:i:s a') ?? '',
			'updated_at'       => $this->customer->updated_at->format('F, j Y h:i:s a') ?? '',
			'created_by'       => ucwords($this->customer->user_created->profile->name) ?? '',
			'updated_by'       => ucwords($this->customer->user_updated->profile->name) ?? '',
		];
	}

	public function edit()
	{
		return redirect()->route('customers-edit', ['customer' => $this->customer->id]);
	}

    public function render()
    {
        return view('livewire.customer.read');
    }
}
