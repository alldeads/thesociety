<?php

namespace App\Http\Livewire\Pos;

use App\Http\Livewire\CustomComponent;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Models\Customer;
use App\Models\Company;

class Cart extends CustomComponent
{
    public $company_id;
    public $items;
    public $inputs;
    public $discount;
    public $customers;

    public $listeners = [
        'refreshPosCartParent' => '$refresh',
        'addPosItem' => 'addItem'
    ];

    public function mount()
    {
        $this->items = [];
        $this->discount = 0;
        $this->customers = Company::getCustomers();

        $this->inputs = [
            'total'     => 0,
            'sub_total' => 0,
            'customer'  => 0,
        ];
    }

    public function addItem($item)
    {
        if ( !isset($this->items[$item['id']]) ) {
            $this->items[$item['id']] = [
                'item' => $item,
                'quantity' => 1,
                'price' => $item['srp_price']
            ];
        } else {
            $this->items[$item['id']]['quantity'] += 1;
        }

        $this->inputs['sub_total'] += $this->items[$item['id']]['price'];
        $this->inputs['total'] += $this->items[$item['id']]['price'];
    }

    public function deleteItem($id)
    {
        if (isset($this->items[$id])) {
            $price = $this->items[$id]['price'] * $this->items[$id]['quantity'];

            $this->inputs['sub_total'] -= $price;
            $this->inputs['total']     -= $price;

            unset($this->items[$id]);
        }
    }

    public function updatedDiscount()
    {
        $discount = (int) $this->discount;

        $this->discount = $discount;
        $this->inputs['total'] = $this->inputs['sub_total'] - $discount;
    }

    public function render()
    {
        return view('livewire.pos.cart');
    }
}
