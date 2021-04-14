<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class Item extends Component
{
	public $item;

	public function delete()
	{
		$this->emit('deleteCustomer', ['item' => $this->item]);
	}

	public function read()
	{
		return redirect()->route('customers-read', ['customer' => $this->item->id]);
	}

    public function render()
    {
        return view('livewire.customer.item');
    }
}
