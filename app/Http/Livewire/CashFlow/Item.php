<?php

namespace App\Http\Livewire\CashFlow;

use Livewire\Component;

class Item extends Component
{
	public $item;

    public function render()
    {
        return view('livewire.cash-flow.item');
    }
}
