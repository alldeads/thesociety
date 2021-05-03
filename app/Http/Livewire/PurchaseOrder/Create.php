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
		$this->inputs['purchase_date'] = Carbon::now()->format('Y-m-d');
		$this->inputs['discount']  = 0;
		$this->inputs['discount_total']  = 0;
		$this->inputs['fixed']     = 0;
		$this->inputs['tax']       = 0;
		$this->inputs['total']     = 0;
		$this->inputs['fee']       = 0;
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

		$this->calculate();
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

		$this->calculate();
	}

	public function calculate()
	{
		$total = 0;
		$sub_total = 0;

		foreach ($this->inputs['items'] as $item) {
			$total     += str_replace(',', '',$item['price']);
			$sub_total += str_replace(',', '',$item['price']);
		}

		$discount = $this->inputs['discount'] ?? 0;
		$y = 0;

		if ( $discount > 0 ) {
			$y = $total * ($discount/100);

			$total -= $y;
		}

		$fixed = $this->inputs['fixed'] ?? 0;

		if ( $fixed > 0 ) {
			$total -= $fixed;
		}

		$this->inputs['discount_total'] = number_format((int) $y + (int) $fixed, 2, '.', ',');

		$tax = $this->inputs['tax'] ?? 0;

		if ( $tax > 0 ) {
			$x = $total * ($tax/100);

			$total += $x;
		}

		$fee = $this->inputs['fee'] ?? 0;

		if ( $fee > 0 ) {
			$total += $fee;
		}

		$this->inputs['total']     = number_format($total, 2, '.', ',');
		$this->inputs['subtotal']  = number_format($sub_total, 2, '.', ',');
	}

	public function save()
	{
		$validator = Validator::make($this->inputs, [
            'reference'        => ['required'],
            'purchase_date'    => ['required', 'date'],
            'supplier'         => ['required', 'numeric', 'exists:suppliers,id'],
            'ship_to'          => ['required', 'numeric', 'exists:employees,id'],
            'items'            => ['required', 'array'],
            'items.*.product'  => ['required', 'numeric'],
            'items.*.cost'     => ['required', 'numeric'],
            'items.*.qty'      => ['required', 'numeric'],
            'notes'            => ['nullable', 'string'],
            'tax'              => ['nullable', 'numeric'],
            'discount'         => ['nullable', 'numeric'],
            'fixed'            => ['nullable', 'numeric'],
            'ship_via'         => ['nullable', 'string'],
            'shipping_method'  => ['nullable', 'string'],
            'shipping_terms'   => ['nullable', 'string'],
        ]);

        if ($validator->fails()) {
        	$error = $validator->errors();
            foreach ($error->all() as $message) {
			    return $this->message($message, 'error');
			}
        }

        $po = PurchaseOrder::where([
        	'company_id' => $this->company->id,
        	'reference'  => $this->inputs['reference']
        ])->first();

        if ($po) {
			return $this->message('Purchase Order No. is used.', 'error');
        }

        try {
        	DB::beginTransaction();

        	$total     = 0;
			$sub_total = 0;
			$quantity  = 0;
			$items     = $this->inputs['items'];

			foreach ($this->inputs['items'] as $item) {
				$quantity  += $item['qty'];
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

			$purchase = PurchaseOrder::create([
				'company_id'    => $this->company->id,
				'supplier_id'   => $this->inputs['supplier'],
				'reference'     => $this->inputs['reference'],
				'purchase_date' => $this->inputs['purchase_date'],
				'sub_total'     => $sub_total,
				'total'         => $total,
				'discount'      => $discount,
				'fixed'         => $fixed,
				'tax'           => $tax,
				'total'         => $total,
				'quantity'      => $quantity,
				'shipping'      => $this->inputs['fee'] ?? 0,
				'created_by'    => auth()->id(),
				'updated_by'    => auth()->id(),
				'status_id'     => 1,
				'ship_to'         => $this->inputs['ship_to'],
				'ship_via'        => $this->inputs['ship_via'] ?? null,
				'shipping_method' => $this->inputs['shipping_method'] ?? null,
				'shipping_terms'  => $this->inputs['shipping_terms'] ?? null,
				'notes'           => $this->inputs['notes'] ?? null,
			]);

			foreach ($this->inputs['items'] as $item) {

				$product = Product::find($item['product']);

				if ( !$product ) {
					return $this->message('Item not found.', 'error');
				}

				PurchaseOrderItem::create([
					'purchase_order_id' => $purchase->id,
					'cost'       => $item['cost'],
					'quantity'   => $item['qty'],
					'product_id' => $product->id,
					'name'       => $product->name,
				]);
			}

        	DB::commit();

        	$this->message('Purchase Order has been created.', 'success');
        } catch (\Exception $e) {
        	DB::rollback();
			$this->message($e->getMessage(), 'error');
        }
	}

    public function render()
    {
        return view('livewire.purchase-order.create');
    }
}
