<?php

namespace App\Http\Livewire\StockLevel;

use Livewire\Component;

class Item extends Component
{
    public $item;

    public function delete()
    {
        $this->emit('deleteStockLevelItem', ['item' => $this->item]);
    }

    public function read()
    {
        return redirect()->route('stock-levels-read', ['stock' => $this->item->id]);
    }

    public function edit()
    {
        return redirect()->route('stock-levels-edit', ['stock' => $this->item->id]);
    }
    
    public function render()
    {
        return view('livewire.stock-level.item');
    }
}
