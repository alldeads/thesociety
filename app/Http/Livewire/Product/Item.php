<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

class Item extends Component
{
	public $item;

	public function delete()
	{
		$this->emit('deleteProduct', ['item' => $this->item]);
	}

    public function render()
    {
        return view('livewire.product.item');
    }
}
