<?php

namespace App\Http\Livewire\Accounting;

use Livewire\Component;

class ChartAccountItem extends Component
{
	public $account;

	public function mount($account)
	{
		$this->account = $account;
	}

    public function render()
    {
        return view('livewire.accounting.chart-account-item');
    }
}
