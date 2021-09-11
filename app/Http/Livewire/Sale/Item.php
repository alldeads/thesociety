<?php

namespace App\Http\Livewire\Sale;

use Livewire\Component;

class Item extends Component
{
    public $item;

    public function delete()
    {
        $this->emit('deleteSalesOrderItem', ['sales' => $this->item]);
    }

    public function edit()
    {
        return redirect()->route('sales-edit', ['sales' => $this->item->id]);
    }

    public function read()
    {
        return redirect()->route('sales-read', ['sales' => $this->item->id]);
    }

    public function render()
    {
        return view('livewire.sale.item');
    }
}
