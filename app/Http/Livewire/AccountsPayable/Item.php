<?php

namespace App\Http\Livewire\AccountsPayable;

use Livewire\Component;

class Item extends Component
{
    public $item;

	public $listeners = [
        'refreshAccountsPayableItem' => '$refresh'
    ];

	public function delete()
	{
		$this->emit('deleteExpenseItem', ['accounts-payable' => $this->item]);
	}

	public function read()
	{
		return redirect()->route('accounts-payable.show', ['accounts-payable' => $this->item->id]);
	}

	public function edit()
	{
		return redirect()->route('accounts-payable.edit', ['accounts-payable' => $this->item->id]);
	}

    public function render()
    {
        return view('livewire.accounts-payable.item');
    }
}
