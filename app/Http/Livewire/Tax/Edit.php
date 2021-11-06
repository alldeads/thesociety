<?php

namespace App\Http\Livewire\Tax;

use App\Http\Livewire\CustomComponent;
use Illuminate\Support\Facades\Validator;

use App\Models\Tax;

class Edit extends CustomComponent
{
    public $tax;
    public $inputs = [];

    public function mount()
    {
    	$this->inputs = [
    		'name'        => $this->tax->name,
    		'percentage'  => $this->tax->percentage,
    	];
    }

    public function submit()
    {
    	$validator = Validator::make($this->inputs, [
            'name'        => ['required', 'string', 'max:255'],
            'percentage'  => ['required', 'numeric'],
        ])->validate();


        $tax = Tax::find($this->tax->id);

        $tax->fill([
			'name'        => ucwords($this->inputs['name']),
			'percentage'  => $this->inputs['percentage'],
			'updated_by'  => auth()->id()
		]);

		$tax->save();

        $this->message('Tax has been updated', 'success');
    }

    public function read()
    {
        return redirect()->route('tax.show', ['tax' => $this->tax->id]);
    }

    public function resetBtn()
    {
        $this->inputs = [
            'name'        => $this->tax->name,
            'percentage'  => $this->tax->percentage,
        ];
    }

    public function render()
    {
        return view('livewire.tax.edit');
    }
}
