<?php

namespace App\Http\Livewire\PurchaseOrder;

use App\Http\Livewire\CustomComponent;
use Illuminate\Support\Facades\Validator;

use App\Models\Supplier;
use App\Models\Employee;
use App\Models\Product;

class Create extends CustomComponent
{
	public $company;
	public $suppliers;
	public $employees;
	public $products;
	public $emp;

	public $inputs = [
		'supplier',
		'employee'
	];

	public function mount()
	{
		$this->suppliers = Supplier::where('company_id', $this->company->id)->get();
		$this->employees = Employee::where('company_id', $this->company->id)->get();
		$this->products  = Product::where('company_id', $this->company->id)->get();
	}

    public function render()
    {
    	// if ( isset($this->inputs['employee']) && !empty($this->inputs['employee']) ) {
    	// 	$results = Employee::find($this->inputs['employee']);

    	// 	$this->emp = $results->user->profile->name;
    	// }

        return view('livewire.purchase-order.create');
    }
}
