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
use App\Models\PaymentType;
use App\Models\Payment;

class Edit extends CustomComponent
{
    public $company;
    public $customers;
    public $products;
    public $sales;
    public $payments;
    public $balance;

    public $inputs = [
        'customer',
        'items'
    ];

    public function mount()
    {
        $this->customers = Customer::where('company_id', $this->company->id)->get();
        $this->payments  = PaymentType::where('company_id', $this->company->id)->active()->get();
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

    public function createPayment()
    {
        $count = count($this->inputs['payments']);

        if ( $this->balance < 0 ) {
            $this->inputs['payments'][$count] = [
                'key'            => 0,
                'payment'        => '',
                'transaction'    => '',
                'amount'         => 0,
                'balance'        => $this->balance
            ];
        }
    }

    public function deletePayment($key)
    {
        $count = count($this->inputs['payments']);

        if ( $count == 1 ) {
            return;
        }

        unset($this->inputs['payments'][$key]);

        $this->inputs['payments'] = array_values($this->inputs['payments']);

        $this->calculate();
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
        return redirect()->route('orders.show', ['order' => $this->sales->id]);
    }

    public function updated($name, $value)
    {
        $field = explode('.', $name);

        if ( isset($field[2]) && isset($field[3]) && $field[1] == 'items' ) {

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

        if ( $discount > $sub_total ) {
            $sub_total = $discount;
        }

        $this->inputs['total']     = number_format($sub_total - $discount, 2, '.', ',');

        $sub = $sub_total - $discount;

        foreach ($this->inputs['payments'] as $key => $payment) {
            $x = (double) str_replace(',', '',$payment['amount']);

            $sub = $sub < 0 ? abs($sub) : $sub;

            $sub = $this->inputs['payments'][$key]['balance'] = $x - $sub;

            $this->balance = $sub;
        }
    }

    public function resetBtn()
    {
        $this->inputs  = [];
        $this->balance = -1;

        foreach ($this->sales->items as $item) {
            $this->inputs['items'][] = [
                'product' => $item->product_id,
                'qty'     => $item->quantity,
                'srp'     => number_format($item->price, 2, '.', ','),
                'price'   => number_format($item->price * $item->quantity, 2, '.', ',')
            ];
        }

        foreach ($this->sales->payments as $payment) {
            $this->inputs['payments'][] = [
                'key'            => $payment->id,
                'payment'        => $payment->payment_type_id,
                'transaction'    => $payment->transaction,
                'amount'         => $payment->amount,
                'balance'        => $payment->balance,
            ];

            $this->balance = $payment->balance;
        }

        if ( !isset($this->inputs['items']) ) {
            $this->inputs['items'][0] = [
                'product' => '',
                'qty'     => 0,
                'srp'     => 0,
                'price'   => 0
            ];
        }

        if ( !isset($this->inputs['payments']) ) {
            $this->inputs['payments'][0] = [
                'key'            => 0,
                'payment'        => '',
                'transaction'    => '',
                'amount'         => 0,
                'balance'        => 0
            ];
        }

        $this->inputs['reference'] = $this->sales->reference;
        $this->inputs['discount']  = $this->sales->discount;
        $this->inputs['subtotal']  = number_format($this->sales->sub_total, 2, '.', ',');
        $this->inputs['total']     = number_format($this->sales->total, 2, '.', ',');
        $this->inputs['notes']     = $this->sales->notes;
        $this->inputs['status']    = $this->sales->status;
        $this->inputs['customer']  = $this->sales->customer_id ?? 0;
    }

    public function update()
    {
        $validator = Validator::make($this->inputs, [
            'reference'               => ['required'],
            'customer'                => ['required', 'numeric'],
            'discount'                => ['required', 'numeric'],
            'status'                  => ['required', 'string'],
            'notes'                   => ['nullable'],
            'items'                   => ['required', 'array'],
            'items.*.product'         => ['required', 'numeric'],
            'items.*.qty'             => ['required', 'numeric'],
            'payments.*.payment'      => ['required', 'numeric'],
            'payments.*.transaction'  => ['nullable'],
            'payments.*.amount'       => ['required', 'numeric'],
            'payments.*.balance'      => ['required', 'numeric'],
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

            $sales->payments()->delete();

            foreach ($this->inputs['payments'] as $payment) {

                $transaction = $payment['transaction'] ?? '';

                if ( empty($payment['transaction']) ) {
                    $transaction = 'PY-' . rand(10000000, 99999999);
                }

                Payment::create([
                    'company_id'      => $this->company->id,
                    'transaction'     => $transaction,
                    'payment_type_id' => $payment['payment'],
                    'updated_by'      => auth()->id(),
                    'created_by'      => auth()->id(),
                    'sub_total'       => $sub_total,
                    'discount'        => $discount,
                    'total'           => $total,
                    'amount'          => $payment['amount'],
                    'balance'         => $payment['balance'],
                    'order_id'        => $sales->id
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
