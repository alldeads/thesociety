<?php

namespace App\Http\Livewire\PurchaseOrder;

use App\Http\Livewire\CustomComponent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

use App\Models\Supplier;
use App\Models\Employee;
use App\Models\Tax;
use App\Models\Product;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;

class Edit extends CustomComponent
{
	public $company;
	public $purchase;
	public $suppliers;
	public $employees;
	public $products;
	public $taxes;
	public $emp;
	public $inputs;

	public function mount()
	{
		$this->suppliers = Supplier::where('company_id', $this->company->id)->get();
		$this->employees = Employee::where('company_id', $this->company->id)->get();
		$this->products  = Product::where('company_id', $this->company->id)->get();
		$this->taxes     = Tax::where('company_id', $this->company->id)->get();

		$quantity = 0;

		foreach ($this->purchase->items as $item) {
			$this->inputs['items'][] = [
				'product' => $item->product_id,
				'name'    => $item->name,
				'cost'    => $item->cost,
				'qty'     => $item->quantity,
				'price'   => $item->cost * $item->quantity,
			];

			$quantity += $item->quantity;
		}

		$this->inputs['reference'] = $this->purchase->reference;
		$this->inputs['supplier'] = $this->purchase->supplier_id;
		$this->inputs['ship_to'] = $this->purchase->ship_to;
		$this->inputs['subtotal']  = $this->purchase->sub_total;
		$this->inputs['purchase_date'] = $this->purchase->purchase_date;
		$this->inputs['discount']  = $this->purchase->discount;
		$this->inputs['discount_total']  = $quantity;
		$this->inputs['fixed']     = $this->purchase->fixed;
		$this->inputs['tax']       = $this->purchase->tax;
		$this->inputs['total']     = $this->purchase->total;
		$this->inputs['fee']       = $this->purchase->shipping;
		$this->inputs['notes'] = $this->purchase->notes ?? "N/A";
		$this->inputs['ship_via'] = $this->purchase->ship_via ?? "N/A";
		$this->inputs['shipping_method'] = $this->purchase->shipping_method ?? "N/A";
		$this->inputs['shipping_terms'] = $this->purchase->shipping_terms ?? "N/A";
	}

    public function render()
    {
        return view('livewire.purchase-order.edit');
    }
}
