<?php

namespace App\Http\Livewire\Supply;

use Livewire\Component;

class Item extends Component
{
    public $item;

	public function delete()
	{
		$this->emit('deleteSupply', ['item' => $this->item]);
	}

	public function read()
	{
		return redirect()->route('supplies-read', ['product' => $this->item->id]);
	}

	public function edit()
	{
		return redirect()->route('supplies-edit', ['product' => $this->item->id]);
	}

    public function render()
    {
        return view('livewire.supply.item');
    }
}
