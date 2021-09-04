<?php

namespace App\Http\Livewire\Pos;

use App\Http\Livewire\CustomComponent;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

use App\Models\Product as ProductModel;
use App\Models\Company;

class Product extends CustomComponent
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $company_id;
    public $search = '';
    public $limit;
    public $count;
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
        $this->count = 0;
        $this->limit = 10;

        $this->items = [];
        $this->discount = 0;

        $this->inputs = [
            'total'     => 0,
            'sub_total' => 0,
            'customer'  => 0,
        ];
    }

    public function updatingSearch()
    {
        $this->resetPage();
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
        $search = $this->search ?? '';
        $limit = $this->limit ?? 10;

        $this->customers = Company::getCustomers();

        $results = ProductModel::where('company_id', $this->company_id)
                    ->where('type', 'product')
                    ->where( function (Builder $query) use ($search) {
                        return $query->where('name', 'like', "%". $search . "%");
                    })
                    ->orderBy('name', 'asc')
                    ->paginate($limit);

        $this->count = $results->total();

        return view('livewire.pos.product', [
            'results' => $results
        ]);
    }
}
