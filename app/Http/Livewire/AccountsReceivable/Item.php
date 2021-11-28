<?php

namespace App\Http\Livewire\AccountsReceivable;

use Livewire\Component;

class Item extends Component
{
    public $item;

	public $listeners = [
        'refreshAccountsReceivableItem' => '$refresh'
    ];

	public function delete()
	{
		$this->emit('deleteAccountsReceivableItem', ['receivable' => $this->item]);
	}

	public function read()
	{
		return redirect()->route('accounts-receivable.show', ['accounts_receivable' => $this->item->id]);
	}

	public function edit()
	{
		return redirect()->route('accounts-receivable.edit', ['accounts_receivable' => $this->item->id]);
	}

    public function render()
    {
        return view('livewire.accounts-receivable.item');
    }
}
