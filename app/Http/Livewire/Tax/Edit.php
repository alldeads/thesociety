<?php

namespace App\Http\Livewire\Tax;

use App\Http\Livewire\CustomComponent;
use Illuminate\Support\Facades\Validator;

use App\Models\Tax;

class Edit extends CustomComponent
{
	public $listeners = [
        'editTaxItem' => 'edit'
    ];

    public $item;
    public $el = "modal-tax-edit";
    public $inputs = [];

    public function edit($item)
    {
    	$this->item = $item;

    	$this->inputs = [
    		'tax_name' => $this->item['item']['name'],
    		'fixed_rate'  => $this->item['item']['fixed_rate'],
    		'percentage'  => $this->item['item']['percentage'],
    	];

    	$this->emit('showModal', ['el' => $this->el]);
    }

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

        $tax = Tax::find($this->item['item']['id']);

        $tax->fill([
			'name'        => ucwords($this->inputs['tax_name']),
			'fixed_rate'  => $this->inputs['fixed_rate'],
			'percentage'  => $this->inputs['percentage'],
			'updated_by'  => auth()->id()
		]);

		$tax->save();

		$this->emit('refreshTax');

        $this->message('Tax has been updated', 'success');

        $this->inputs = [];

        $this->emit('dissmissModal', ['el' => $this->el]);
    }

    public function render()
    {
        return view('livewire.tax.edit');
    }
}
