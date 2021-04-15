<?php

namespace App\Http\Livewire\Supplier;

use Livewire\Component;

class Item extends Component
{
	public $item;

	public function delete()
	{
		$this->emit('deleteSupplier', ['item' => $this->item]);
	}

	public function read()
	{
		return redirect()->route('suppliers-read', ['supplier' => $this->item->id]);
	}
	
    public function render()
    {
        return view('livewire.supplier.item');
    }
}
