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
		$this->emit('deleteCashFlowItem', ['cashflow' => $this->item]);
	}

	public function read()
	{
		return redirect()->route('expense.show', ['expense' => $this->item->id]);
	}

	public function edit()
	{
		return redirect()->route('expense.edit', ['expense' => $this->item->id]);
	}

    public function render()
    {
        return view('livewire.expense.item');
    }
}
