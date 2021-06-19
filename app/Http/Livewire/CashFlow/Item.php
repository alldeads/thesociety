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
		return redirect()->route('cash-flow-read', ['cashflow' => $this->item->id]);
	}

    public function render()
    {
    	$this->last = CashFlow::getCompanyLastEntry();
        return view('livewire.cash-flow.item');
    }
}
