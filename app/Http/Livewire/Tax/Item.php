<?php

namespace App\Http\Livewire\Tax;

use Livewire\Component;

class Item extends Component
{
	public $item;

    public function render()
    {
        return view('livewire.tax.item');
    }
}
