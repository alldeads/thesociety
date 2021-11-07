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
        return redirect()->route('orders.edit', ['order' => $this->item->id]);
    }

    public function read()
    {
        return redirect()->route('orders.show', ['order' => $this->item->id]);
    }

    public function render()
    {
        return view('livewire.sale.item');
    }
}
