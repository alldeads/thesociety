<?php

namespace App\Http\Livewire\PurchaseOrder;

use Livewire\Component;

class Item extends Component
{
	public $item;
	
    public function render()
    {
        return view('livewire.purchase-order.item');
    }
}
