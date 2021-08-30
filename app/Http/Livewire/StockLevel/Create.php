<?php

namespace App\Http\Livewire\StockLevel;

use App\Models\Company;
use App\Models\StockLevel;
use App\Models\InventoryType;
use App\Http\Livewire\CustomComponent;

class Create extends CustomComponent
{
    public $products;
    public $company_id;
    public $company;
    public $branches;
    public $reasons;
    public $inputs = [
        'stock'   => 0,
        'on_hand' => 0,
        'damage'  => 0,
        'add_stock'  => 0,
        'after'   => 0,
        'product' => 0,
        'reason'  => 2,
        'branch'  => 0,
        'notes'   => ''
    ];

    public function mount()
    {
        $this->company  = Company::find($this->company_id);
        $this->products = $this->company->products;
        $this->branches = $this->company->branches;
        $this->reasons  = InventoryType::all();
    }

    public function getStocks()
    {
        $product = (int) $this->inputs['product'];
        $branch  = (int) $this->inputs['branch'];
        $reason  = (int) $this->inputs['reason'];
        $add     = (int) $this->inputs['add_stock'];
        $hand    = (int) $this->inputs['on_hand'];
        $loss    = (int) $this->inputs['damage'];

        if ( $product > 0 && $branch > 0 ) {
            $stock = StockLevel::where([
                'company_id' => $this->company_id,
                'product_id' => $product,
                'branch_id'  => $branch
            ])->first();

            $stock_hand = $stock->after_stock ?? 0;

            $this->inputs['stock'] = $stock_hand;

            if ( $reason == 2 ) {
                $this->inputs['after'] = $this->inputs['stock'] + $add;
            }

            else if ( $reason == 3 ) {
                $this->inputs['after'] = $hand;
            }

            else {
                $this->inputs['after'] = $this->inputs['stock'] - $loss;
            }
        }
    }

    public function render()
    {
        $this->getStocks();

        return view('livewire.stock-level.create');
    }
}
