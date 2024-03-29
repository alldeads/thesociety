<?php

namespace App\Http\Livewire\Expense;

use Livewire\Component;

class Item extends Component
{
    public $item;

	public $listeners = [
        'refreshExpenseItem' => '$refresh'
    ];

	public function delete()
	{
		$this->emit('deleteExpenseItem', ['expense' => $this->item]);
	}

	public function read()
	{
		return redirect()->route('expenses.show', ['expense' => $this->item->id]);
	}

	public function edit()
	{
		return redirect()->route('expenses.edit', ['expense' => $this->item->id]);
	}

    public function render()
    {
        return view('livewire.expense.item');
    }
}
