<?php

namespace App\Http\Livewire\Tax;

use App\Http\Livewire\CustomComponent;
use Illuminate\Support\Facades\Validator;

use App\Models\Tax;

class Create extends CustomComponent
{
	public $inputs = [
		'name',
		'percentage'
	];

	public $company_id;

	public function submit()
	{
		$validator = Validator::make($this->inputs, [
            'name'        => ['required', 'string', 'max:255'],
            'percentage'  => ['required', 'numeric'],
        ])->validate();

        Tax::create([
			'name'        => ucwords($this->inputs['name']),
			'fixed_rate'  => 0,
			'percentage'  => $this->inputs['percentage'],
			'created_by'  => auth()->id(),
			'company_id'  => $this->company_id
		]);

        $this->message('New Tax has been created', 'success');

        $this->inputs = [];
	}

    public function render()
    {
        return view('livewire.tax.create');
    }
}
