<?php

namespace App\Http\Livewire\Tax;

use App\Http\Livewire\CustomComponent;
use Illuminate\Support\Facades\Validator;

use App\Models\Tax;

class Create extends CustomComponent
{
	public $inputs = [
		'tax_name',
		'fixed_rate',
		'percentage'
	];

	public $company_id;

	public function submit()
	{
		$validator = Validator::make($this->inputs, [
            'tax_name'    => ['required', 'string', 'max:255'],
            'fixed_rate'  => ['nullable', 'numeric'],
            'percentage'  => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
        	$error = $validator->errors();
            foreach ($error->all() as $message) {
			    $this->message($message, 'error');
			    return;
			}
        }

        Tax::create([
			'name'        => ucwords($this->inputs['tax_name']),
			'fixed_rate'  => $this->inputs['fixed_rate'] ?? 0,
			'percentage'  => $this->inputs['percentage'],
			'created_by'  => auth()->id(),
			'company_id'  => $this->company_id
		]);

		$this->emit('refreshTaxParent');

        $this->message('New Tax has been created', 'success');

        $this->inputs = [];

        $this->emit('dissmissModal', ['el' => 'modal-tax-create']);
	}

    public function render()
    {
        return view('livewire.tax.create');
    }
}
