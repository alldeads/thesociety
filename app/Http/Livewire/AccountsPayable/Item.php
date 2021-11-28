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
		$this->emit('deleteAccountsPayableItem', ['payable' => $this->item]);
	}

	public function read()
	{
		return redirect()->route('accounts-payable.show', ['accounts_payable' => $this->item->id]);
	}

	public function edit()
	{
		return redirect()->route('accounts-payable.edit', ['accounts_payable' => $this->item->id]);
	}

    public function render()
    {
        return view('livewire.accounts-payable.item');
    }
}
