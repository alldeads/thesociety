<?php

namespace App\Http\Livewire\PurchaseOrder;

use App\Http\Livewire\CustomComponent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

use App\Models\Supplier;
use App\Models\Employee;
use App\Models\Status;
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
	public $statuses;
	public $taxes;
	public $emp;
	public $inputs;

	public function mount()
	{
		$this->suppliers = Supplier::where('company_id', $this->company->id)->get();
		$this->employees = Employee::where('company_id', $this->company->id)->get();
		$this->products  = Product::where('company_id', $this->company->id)->get();
		$this->taxes     = Tax::where('company_id', $this->company->id)->get();
		$this->statuses  = Status::where('is_purchase_order', 1)->get();

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

		if ( !isset($this->inputs['items']) ) {
			$this->inputs['items'][0] = [
				'product' => '',
				'name'    => '',
				'cost'    => 0,
				'qty'     => 0,
				'price'   => 0
			];
		}

		$this->inputs['status'] = $this->purchase->status_id;
		$this->inputs['created_by'] = $this->purchase->user_created->profile->name ?? "N/A";
		$this->inputs['approved_by'] = $this->purchase->approved_by;
		$this->inputs['requested_by'] = $this->purchase->requested_by;
		$this->inputs['created_at'] = $this->purchase->created_at;
		$this->inputs['updated_at'] = $this->purchase->updated_at;
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

	public function preview()
	{
		return redirect()->route('purchase-orders-read', ['purchase' => $this->purchase->id]);
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
            'status'           => ['required', 'exists:statuses,id'],
            'purchase_date'    => ['required', 'date'],
            'supplier'         => ['required', 'numeric', 'exists:suppliers,id'],
            'ship_to'          => ['required', 'numeric', 'exists:employees,id'],
            'approved_by'      => ['required', 'numeric', 'exists:employees,id'],
            'requested_by'     => ['required', 'numeric', 'exists:employees,id'],
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
        ])->where('id', '!=', $this->purchase->id)->first();

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

			$purchase = PurchaseOrder::find($this->purchase->id);

			$purchase->fill([
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
				'shipping'      => (int) $this->inputs['fee'],
				'updated_by'    => auth()->id(),
				'approved_by'   => $this->inputs['approved_by'],
				'requested_by'  => $this->inputs['requested_by'],
				'status_id'     => $this->inputs['status'],
				'ship_to'         => $this->inputs['ship_to'],
				'ship_via'        => $this->inputs['ship_via'] ?? null,
				'shipping_method' => $this->inputs['shipping_method'] ?? null,
				'shipping_terms'  => $this->inputs['shipping_terms'] ?? null,
				'notes'           => $this->inputs['notes'] ?? null,
			]);

			$purchase->save();

			$purchase->items()->delete();

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

        	$this->message('Purchase Order has been updated.', 'success');
        } catch (\Exception $e) {
        	DB::rollback();
			$this->message($e->getMessage(), 'error');
        }
	}

    public function render()
    {
        return view('livewire.purchase-order.edit');
    }
}