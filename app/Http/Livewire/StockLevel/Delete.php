<?php

namespace App\Http\Livewire\StockLevel;

use App\Http\Livewire\CustomComponent;
use Illuminate\Support\Facades\DB;

use App\Models\StockLevel;
use App\Models\InventoryHistory;

class Delete extends CustomComponent
{
    public $listeners = [
        'deleteStockLevelItem' => 'delete'
    ];

    public $item;
    public $el = "delete-stock-level-item";

    public function delete($item)
    {
        $this->item = $item;
        $this->emit('showModal', ['el' => $this->el]);
    }

    public function confirm()
    {
        try {
            DB::beginTransaction();

            $sl = StockLevel::find($this->item['item']['id']);

            if ( !$sl ) {
                $this->message('Oops! Something went wrong upon deletion, please try again!', 'error');
            }

            $sl->updated_by = auth()->id();
            $sl->save();
            $sl->delete();

            InventoryHistory::create([
                'reference'  => 'IN-' . rand(100000, 999999),
                'company_id' => $sl->company_id,
                'product_id' => $sl->product_id,
                'branch_id'  => $sl->branch_id,
                'inventory_type_id' => 6,
                'in_stock' => $sl->after_stock,
                'on_hand'  => 0,
                'difference' => $sl->after_stock,
                'type'       => 0,
                'notes'      => 'This stock has been removed. --TS32',
                'created_by' => auth()->id()
            ]);

            DB::commit();

            $this->emit('dissmissModal', ['el' => $this->el]);
            $this->message('Success! Stocks has been deleted.', 'success');
            $this->emit('refreshStockLevelParent');
        } catch(\Exception $e) {
            DB::rollback();
            $this->message($e->getMessage(), 'error');
        }
    }

    public function render()
    {
        return view('livewire.stock-level.delete');
    }
}
