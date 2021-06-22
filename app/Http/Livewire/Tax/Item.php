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
		$this->emit('editTaxItem', ['item' => $this->item]);
	}

	public function read()
	{
		$this->emit('readTaxItem', ['item' => $this->item]);
	}

    public function render()
    {
        return view('livewire.tax.item');
    }
}
