<?php

namespace App\Http\Livewire\Supplier;

use Livewire\Component;

class Item extends Component
{
	public $item;
	
    public function render()
    {
        return view('livewire.supplier.item');
    }
}
