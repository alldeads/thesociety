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

	public function read()
	{
		return redirect()->route('products-read', ['product' => $this->item->id]);
	}

    public function render()
    {
        return view('livewire.product.item');
    }
}
