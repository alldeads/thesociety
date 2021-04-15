<?php

namespace App\Http\Livewire\Supplier;

use Livewire\Component;

class Read extends Component
{
	public $supplier;

	public $inputs;

	public function mount()
	{
		$this->inputs = [
			'first_name'       => $this->supplier->user->profile->first_name ?? '',
			'last_name'        => $this->supplier->user->profile->last_name ?? '',
			'phone'            => $this->supplier->user->profile->phone_number ?? '',
			'email'            => $this->supplier->user->email ?? '',
			'status'           => ucwords($this->supplier->status->name) ?? '',
			'company'          => $this->supplier->user->profile->company ?? '',
			'position'         => $this->supplier->user->profile->position ?? '',
			'telephone'        => $this->supplier->user->profile->telephone ?? '',
			'country'          => $this->supplier->user->profile->country ?? '',
			'state'            => $this->supplier->user->profile->state ?? '',
			'city'             => $this->supplier->user->profile->city ?? '',
			'postal'           => $this->supplier->user->profile->postal ?? '',
			'address_line_2'   => $this->supplier->user->profile->address_line_2 ?? '',
			'address_line_1'   => $this->supplier->user->profile->address_line_1 ?? '',
			'contact_phone'    => $this->supplier->phone ?? '',
			'contact_email'    => $this->supplier->email ?? '',
			'created_at'       => $this->supplier->created_at->format('F, j Y h:i:s a') ?? '',
			'updated_at'       => $this->supplier->updated_at->format('F, j Y h:i:s a') ?? '',
			'created_by'       => ucwords($this->supplier->user_created->profile->name) ?? '',
			'updated_by'       => ucwords($this->supplier->user_updated->profile->name) ?? '',
		];
	}

	public function edit()
	{
		return redirect()->route('suppliers-edit', ['supplier' => $this->supplier->id]);
	}

    public function render()
    {
        return view('livewire.supplier.read');
    }
}
