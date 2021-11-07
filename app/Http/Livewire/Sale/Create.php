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

class Create extends CustomComponent
{
    public $company;
    public $customers;
    public $products;
    public $payments;
    public $balance;

    public $inputs = [
        'customer',
        'items',
        'status'
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
                'payment'        => '',
                'transaction'    => '',
                'amount'         => 0,
                'balance'        => $this->balance
            ];
        }
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
        $total     = 0;
        $sub_total = 0;
        $discount  = (double) $this->inputs['discount'] ?? 0;

        foreach ($this->inputs['items'] as $item) {
            $total     += str_replace(',', '',$item['price']);
            $sub_total += str_replace(',', '',$item['price']);
        }

        $this->inputs['discount']  = $discount;
        $this->inputs['subtotal']  = number_format($sub_total, 2, '.', ',');

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

        $this->inputs['items'][0] = [
            'product' => '',
            'qty'     => 0,
            'srp'     => 0,
            'price'   => 0
        ];

        $this->inputs['payments'][0] = [
            'payment'        => '',
            'transaction'    => '',
            'amount'         => 0,
            'balance'        => 0
        ];

        $this->inputs['reference'] = 'SL-' . rand(111111, 999999);
        $this->inputs['discount']  = 0;
        $this->inputs['subtotal']  = 0;
        $this->inputs['amount']    = 0;
        $this->inputs['total']     = 0;
        $this->inputs['customer']  = 0;
        $this->inputs['status']    = 'pending';
    }

    public function save()
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
            'payments.*.payment'      => ['required', 'numeric'],
            'payments.*.transaction'  => ['nullable'],
            'payments.*.amount'       => ['required', 'numeric'],
            'payments.*.balance'      => ['required', 'numeric'],
        ])->validate();

        $so = SalesOrder::where([
            'company_id' => $this->company->id,
            'reference'  => $this->inputs['reference']
        ])->first();

        if ($so) {
            return $this->message('Sales Order No. is used.', 'error');
        }

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

            $total = $total - $discount;

            $sales = SalesOrder::create([
                'company_id'    => $this->company->id,
                'customer_id'   => $this->inputs['customer'] == 0 ? NULL : $this->inputs['customer'],
                'reference'     => $this->inputs['reference'],
                'sub_total'     => $sub_total,
                'discount'      => $discount,
                'total'         => $total,
                'quantity'      => $quantity,
                'created_by'    => auth()->id(),
                'updated_by'    => auth()->id(),
                'type'          => $this->inputs['customer'] == 0 ? 'guest' : 'customer',
                'status'        => $this->inputs['status'],
                'notes'         => $this->inputs['notes'] ?? null
            ]);

            foreach ($this->inputs['payments'] as $payment) {

                if ( $payment['balance'] < 0 ) {
                    $total = $payment['amount'] - $payment['balance'];
                } else {
                    $total = $payment['amount'] - abs($payment['balance']);
                }

                Payment::create([
                    'transaction'     => $payment['transaction'] ?? 'PY-' . rand(111111, 999999),
                    'payment_type_id' => $payment['payment'],
                    'company_id'      => $this->company->id,
                    'created_by'      => auth()->id(),
                    'updated_by'      => auth()->id(),
                    'sub_total'       => $sub_total,
                    'discount'        => $discount,
                    'total'           => $total,
                    'amount'          => $payment['amount'],
                    'balance'         => $payment['balance'],
                    'order_id'        => $sales->id
                ]);
            }

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

            $this->resetBtn();

            $this->message('Sales Order has been created.', 'success');
        } catch (\Exception $e) {
            DB::rollback();
            $this->message($e->getMessage(), 'error');
        }
    }

    public function render()
    {
        return view('livewire.sale.create');
    }
}
