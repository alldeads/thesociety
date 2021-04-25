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
		'employee',
		'items'
	];

	public function mount()
	{
		$this->suppliers = Supplier::where('company_id', $this->company->id)->get();
		$this->employees = Employee::where('company_id', $this->company->id)->get();
		$this->products  = Product::where('company_id', $this->company->id)->get();

		$this->inputs['items'][0] = [
			'product' => '',
			'name'    => '',
			'cost'    => 0,
			'qty'     => 0,
			'price'   => 0
		];

		$this->inputs['subtotal'] = 0;
		$this->inputs['discoount'] = 0;
		$this->inputs['tax'] = 0;
		$this->inputs['total'] = 0;
	}

	public function createItem()
	{
		$count = count($this->inputs['items']);

		$this->inputs['items'][$count] = [
			'product' => '',
			'name'    => '',
			'cost'    => 0,
			'qty'     => 0,
			'price'   => 0
		];
	}

	public function deleteItem($key)
	{
		$count = count($this->inputs['items']);

		if ( $count == 1 ) {
			return;
		}

		unset($this->inputs['items'][$key]);

		$this->inputs['items'] = array_values($this->inputs['items']);
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
