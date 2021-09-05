<?php

namespace App\Http\Livewire\StockLevel;

use App\Models\Company;
use App\Models\StockLevel;
use App\Models\InventoryType;
use App\Models\InventoryHistory;
use App\Http\Livewire\CustomComponent;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Edit extends CustomComponent
{
    public $products;
    public $company_id;
    public $company;
    public $branches;
    public $reasons;
    public $inputs;
    public $stock;

    public function mount()
    {
        $this->company  = Company::find($this->company_id);
        $this->products = $this->company->products;
        $this->branches = $this->company->branches;
        $this->reasons  = InventoryType::all();

        $this->initialize();
    }

    public function initialize()
    {
        $this->inputs = [
            'stock'   => 0,
            'on_hand' => 0,
            'damage'  => 0,
            'add_stock'  => 0,
            'after'   => 0,
            'product' => $this->stock->product->id ?? 0,
            'reason'  => 2,
            'branch'  => $this->stock->branch->id ?? 0,
            'notes'   => ''
        ];
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

    public function submit()
    {
        $validator = Validator::make($this->inputs, [
            'product'   => ['required', 'exists:products,id'],
            'branch'    => ['required', 'exists:branches,id'],
            'reason'    => ['required', 'exists:inventory_types,id'],
            'add_stock' => ['nullable', 'numeric'],
            'on_hand'   => ['nullable', 'numeric'],
            'damage'    => ['nullable', 'numeric'],
            'notes'     => ['nullable', 'string'],
        ])->validate();

        $reason = $this->inputs['reason'];

        if ( $reason == 2 && $this->inputs['add_stock'] <= 0 ) {
            return $this->message('Add stock value must greater than zero!', 'error');
        }

        if ( $reason == 4 && $this->inputs['damage'] <= 0 ) {
            return $this->message('Loss/Damage value must greater than zero!', 'error');
        }

        try {
            DB::beginTransaction();

            $sl = StockLevel::where([
                'company_id' => $this->company_id,
                'product_id' => $this->inputs['product'],
                'branch_id'  => $this->inputs['branch']
            ])->first();

            $stock_hand = $sl->after_stock ?? 0;
            $after = 0;
            $type  = 1;
            $difference = 0;

            if ( $reason == 2 ) {
                $after = $stock_hand + $this->inputs['add_stock'];
                $difference = $this->inputs['add_stock'];
            }

            else if ( $reason == 3 ) {
                $after = $this->inputs['on_hand'];

                if ( $stock_hand <= 0 ) {
                    $difference = $this->inputs['on_hand'];
                } else {
                    $difference = $stock_hand - $this->inputs['on_hand'];
                    $type = 0;
                }
            }

            else {
                $after = $stock_hand - $this->inputs['damage'];
                $difference = $this->inputs['damage'];
                $type = 0;
            }

            $data = [
                'in_stock'    => $stock_hand,
                'after_stock' => $after,
                'updated_by'  => auth()->id()
            ];

            if ( !$sl ) {
                $data ['reference']  = 'SL-' . rand(100000, 999999);
                $data ['created_by'] = auth()->id();
            }

            $stock = StockLevel::updateOrCreate([
                'company_id'  => $this->company_id,
                'product_id'  => $this->inputs['product'],
                'branch_id'   => $this->inputs['branch'],
            ], $data);

            InventoryHistory::create([
                'reference'         => 'IN-' . rand(100000, 999999),
                'company_id'        => $this->company_id,
                'product_id'        => $this->inputs['product'],
                'branch_id'         => $this->inputs['branch'],
                'inventory_type_id' => $reason,
                'type'              => $type,
                'in_stock'          => $stock_hand,
                'notes'             => $this->inputs['notes'],
                'difference'        => $difference,
                'on_hand'           => $after,
                'created_by'        => auth()->id()
            ]);

            DB::commit();

            $this->message('Stock has been adjusted!', 'success');

            $this->initialize();
            
        } catch(\Exception $e) {
            DB::rollback();
            $this->message($e->getMessage(), 'error');
        }
    }

    public function render()
    {
        $this->getStocks();

        return view('livewire.stock-level.edit');
    }
}
