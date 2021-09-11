<?php

namespace App\Http\Livewire\Sale;

use App\Http\Livewire\CustomComponent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

use App\Models\Customer;
use App\Models\Product;
use App\Models\SalesOrder;
use App\Models\SalesOrderItem;

class Edit extends CustomComponent
{
    public $company;
    public $customers;
    public $products;
    public $sales;

    public $inputs = [
        'customer',
        'items'
    ];

    public function mount()
    {
        $this->customers = Customer::where('company_id', $this->company->id)->get();
        $this->products  = Product::where([
            'company_id' => $this->company->id,
            'type' => 'product'
        ])->get();

        $this->resetBtn();
    }

    public function createItem()
    {
        $count = count($this->inputs['items']);

        $this->inputs['items'][$count] = [
            'product' => '',
            'srp'     => 0,
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

    public function read()
    {
        return redirect()->route('sales-read', ['sales' => $this->sales->id]);
    }

    public function updated($name, $value)
    {
        $field = explode('.', $name);

        if ( isset($field[2]) && isset($field[3]) ) {

            $pr = $field[3] == 'product' ? $value : $this->inputs['items'][$field[2]]['product'];

            $product = Product::find($pr);

            if ( !$product ) {
                return;
            }

            $qty = $this->inputs['items'][$field[2]]['qty'] ?? 0;

            if ( $qty > 0 ) {
                $this->inputs['items'][$field[2]]['qty']   = $qty;
                $this->inputs['items'][$field[2]]['price'] = number_format($qty * $product->srp_price, 2, '.', ',');
            } else {
                $this->inputs['items'][$field[2]]['qty']   = 1;
                $this->inputs['items'][$field[2]]['price'] = number_format(1 * $product->srp_price, 2, '.', ',');
            }

            $this->inputs['items'][$field[2]]['srp'] = number_format($product->srp_price, 2, '.', ',');
            $this->inputs['items'][$field[2]]['product'] = $product->id;
            $this->inputs['items'][$field[2]]['name'] = $product->name;
        }

        $this->calculate();
    }

    public function calculate()
    {
        $total = 0;
        $sub_total = 0;
        $discount = (double) $this->inputs['discount'] ?? 0;

        foreach ($this->inputs['items'] as $item) {
            $total     += str_replace(',', '',$item['price']);
            $sub_total += str_replace(',', '',$item['price']);
        }

        $this->inputs['discount']  = $discount;
        $this->inputs['subtotal']  = number_format($sub_total, 2, '.', ',');
        $this->inputs['total']     = number_format($sub_total - $discount, 2, '.', ',');
    }

    public function resetBtn()
    {
        $this->inputs = [];

        foreach ($this->sales->items as $item) {
            $this->inputs['items'][] = [
                'product' => $item->product_id,
                'qty'     => $item->quantity,
                'srp'     => number_format($item->price, 2, '.', ','),
                'price'   => number_format($item->price * $item->quantity, 2, '.', ',')
            ];
        }

        if ( !isset($this->inputs['items']) ) {
            $this->inputs['items'][0] = [
                'product' => '',
                'qty'     => 0,
                'srp'     => 0,
                'price'   => 0
            ];
        }

        $this->inputs['reference'] = $this->sales->reference;
        $this->inputs['discount']  = $this->sales->discount;
        $this->inputs['subtotal']  = number_format($this->sales->sub_total, 2, '.', ',');
        $this->inputs['total']     = number_format($this->sales->total, 2, '.', ',');
        $this->inputs['notes']     = $this->sales->notes;
        $this->inputs['status']    = $this->sales->status;
        $this->inputs['customer']  = $this->sales->customer_id;
    }

    public function update()
    {
        $validator = Validator::make($this->inputs, [
            'reference'        => ['required'],
            'customer'         => ['required', 'numeric'],
            'discount'         => ['required', 'numeric'],
            'status'           => ['required', 'string'],
            'notes'            => ['nullable'],
            'items'            => ['required', 'array'],
            'items.*.product'  => ['required', 'numeric'],
            'items.*.qty'      => ['required', 'numeric'],
        ])->validate();

        try {
            DB::beginTransaction();

            $total     = 0;
            $sub_total = 0;
            $quantity  = 0;
            $discount  = $this->inputs['discount'];
            $items     = $this->inputs['items'];

            foreach ($this->inputs['items'] as $item) {
                $quantity  += $item['qty'];
                $total     += str_replace(',', '',$item['price']);
                $sub_total += str_replace(',', '',$item['price']);
            }

            $sales = SalesOrder::find($this->sales->id);

            if (!$sales) {
                return $this->message('Sales order not found.', 'error');
            }

            $sales->update([
                'customer_id'   => $this->inputs['customer'] == 0 ? NULL : $this->inputs['customer'],
                'reference'     => $this->inputs['reference'],
                'sub_total'     => $sub_total,
                'discount'      => $discount,
                'total'         => $total - $discount,
                'quantity'      => $quantity,
                'updated_by'    => auth()->id(),
                'notes'         => $this->inputs['notes'],
                'type'          => $this->inputs['customer'] == 0 ? 'guest' : 'customer',
                'status'        => $this->inputs['status']
            ]);

            $sales->items()->delete();

            foreach ($this->inputs['items'] as $item) {

                $product = Product::find($item['product']);

                if ( !$product ) {
                    return $this->message('Item not found.', 'error');
                }

                SalesOrderItem::create([
                    'sales_order_id' => $sales->id,
                    'quantity'   => $item['qty'],
                    'product_id' => $product->id,
                    'price'      => $product->srp_price,
                ]);
            }

            DB::commit();

            $this->message('Sales Order has been updated.', 'success');
        } catch (\Exception $e) {
            DB::rollback();
            $this->message($e->getMessage(), 'error');
        }
    }

    public function render()
    {
        return view('livewire.sale.edit');
    }
}
