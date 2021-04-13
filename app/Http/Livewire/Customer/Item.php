<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class Item extends Component
{
	public $item;

    public function render()
    {
        return view('livewire.customer.item');
    }
}
