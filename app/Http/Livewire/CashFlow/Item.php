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

    public function render()
    {
    	$this->last = CashFlow::where('company_id', $this->item->company_id)->orderBy('id', 'desc')->first();

        return view('livewire.cash-flow.item');
    }
}
