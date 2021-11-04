<?php

namespace App\Http\Livewire\CashFlow;

use Livewire\Component;

use App\Models\CashFlow;

class Item extends Component
{
	public $item;
	public $last;

	public $listeners = [
        'refreshCashFlowItem' => '$refresh'
    ];

	public function delete()
	{
		$this->emit('deleteCashFlowItem', ['cashflow' => $this->item]);
	}

	public function read()
	{
		return redirect()->route('cash-flow.show', ['cash_flow' => $this->item->id]);
	}

	public function edit()
	{
		return redirect()->route('cash-flow.edit', ['cash_flow' => $this->item->id]);
	}

    public function render()
    {
    	$this->last = CashFlow::getCompanyLastEntry();
        return view('livewire.cash-flow.item');
    }
}
