<?php

namespace App\Http\Livewire\CashFlow;

use Livewire\Component;

use App\Models\CashFlow;

class Item extends Component
{
	public $item;
	public $last;

	public function mount()
	{
		$this->last = CashFlow::where('company_id', $this->item->company_id)->orderBy('id', 'desc')->first();
	}

    public function render()
    {
        return view('livewire.cash-flow.item');
    }
}
