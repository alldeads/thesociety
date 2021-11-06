<?php

namespace App\Http\Livewire\Tax;

use Livewire\Component;

class Item extends Component
{
	public $item;

	public $listeners = [
        'refreshTax' => '$refresh'
    ];

	public function delete()
	{
		$this->emit('deleteTaxItem', ['item' => $this->item]);
	}

	public function edit()
	{
		return redirect()->route('tax.edit', ['tax' => $this->item->id]);
	}

	public function read()
	{
		return redirect()->route('tax.show', ['tax' => $this->item->id]);
	}

    public function render()
    {
        return view('livewire.tax.item');
    }
}
