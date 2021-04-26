<?php

namespace App\Http\Livewire\PurchaseOrder;

use App\Http\Livewire\CustomComponent;
use Illuminate\Support\Facades\Validator;

use App\Models\Supplier;
use App\Models\Employee;
use App\Models\Tax;
use App\Models\Product;
use App\Models\PurchaseOrder;

class Create extends CustomComponent
{
	public $company;
	public $suppliers;
	public $employees;
	public $products;
	public $taxes;
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
		$this->taxes     = Tax::where('company_id', $this->company->id)->get();

		$this->inputs['items'][0] = [
			'product' => '',
			'name'    => '',
			'cost'    => 0,
			'qty'     => 0,
			'price'   => 0
		];

		$this->inputs['reference'] = PurchaseOrder::generate_reference($this->company->id);
		$this->inputs['subtotal']  = 0;
		$this->inputs['date']      = now()->format('Y-m-d');
		$this->inputs['discount'] = 0;
		$this->inputs['fixed'] = 0;
		$this->inputs['tax']       = 0;
		$this->inputs['total']     = 0;
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

	public function updated($name, $value)
	{
		$field = explode('.', $name);

		if ( isset($field[2]) && isset($field[3]) ) {
			if ( $field[3] == "product" ) {
				$product = Product::find($value);

				if ( !$product ) {
					return;
				}

				$qty = $this->inputs['items'][$field[2]]['qty'] ?? 0;

				if ( $qty > 0 ) {
					$this->inputs['items'][$field[2]]['qty']   = $qty;
					$this->inputs['items'][$field[2]]['price'] = number_format($qty * $product->cost, 2, '.', ',');
				} else {
					$this->inputs['items'][$field[2]]['qty']   = 1;
					$this->inputs['items'][$field[2]]['price'] = number_format(1 * $product->cost, 2, '.', ',');
				}

				$this->inputs['items'][$field[2]]['product'] = $product->id;
				$this->inputs['items'][$field[2]]['name'] = $product->name;
				$this->inputs['items'][$field[2]]['cost'] = $product->cost;
			}

			if ( $field[3] == "qty" ) {

				$product = $this->inputs['items'][$field[2]]['product'] ?? 0;
				$cost = $this->inputs['items'][$field[2]]['cost'] ?? 0;
				$value = (int) $value;

				$this->inputs['items'][$field[2]]['price'] = number_format($value * $cost, 2, '.', ',');
			}
		}

		$total = 0;
		$sub_total = 0;

		foreach ($this->inputs['items'] as $item) {
			$total     += str_replace(',', '',$item['price']);
			$sub_total += str_replace(',', '',$item['price']);
		}

		$discount = $this->inputs['discount'] ?? 0;

		if ( $discount > 0 ) {
			$y = $total * ($discount/100);

			$total -= $y;
		}

		$fixed = $this->inputs['fixed'] ?? 0;

		if ( $fixed > 0 ) {
			$total -= $fixed;
		}

		$tax = $this->inputs['tax'] ?? 0;

		if ( $tax > 0 ) {
			$x = $total * ($tax/100);

			$total += $x;
		}

		$this->inputs['total']     = number_format($total, 2, '.', ',');
		$this->inputs['subtotal']  = number_format($sub_total, 2, '.', ',');
	}

	public function save()
	{
		dd($this->inputs);
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
