<?php

namespace App\Http\Livewire\Customer;

use App\Http\Livewire\CustomComponent;
use Illuminate\Support\Facades\Validator;

class Create extends CustomComponent
{
	public $company_id;

	public $inputs = [];

	public function submit()
	{
		Validator::make($this->inputs, [
            'first_name'  => ['required', 'string', 'max:255'],
            'last_name'   => ['required', 'string', 'max:255'],
            'phone'       => ['required'],
            'email'       => ['required', 'unique:users']
        ])->validate();
	}

    public function render()
    {
        return view('livewire.customer.create');
    }
}
