<?php

namespace App\Http\Livewire\StockLevel;

use App\Http\Livewire\CustomComponent;

use App\Models\StockLevel;

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
        $sl = StockLevel::find($this->item['item']['id']);

        if ( !$sl ) {
            $this->message('Oops! Something went wrong upon deletion, please try again!', 'error');
        }

        $sl->updated_by = auth()->id();
        $sl->save();
        $sl->delete();

        $this->emit('dissmissModal', ['el' => $this->el]);
        $this->message('Success! Stocks has been deleted.', 'success');
        $this->emit('refreshStockLevelParent');
    }

    public function render()
    {
        return view('livewire.stock-level.delete');
    }
}
