<?php

namespace App\Http\Livewire\Accounting;

use Livewire\Component;

use App\Models\ChartAccount as CA;

class ChartAccount extends Component
{
	public $accounts;

	public function mount()
	{
		$this->accounts = CA::all();
	}

    public function render()
    {
        return view('livewire.accounting.chart-account');
    }
}
