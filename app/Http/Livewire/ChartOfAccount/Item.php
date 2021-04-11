<?php

namespace App\Http\Livewire\ChartOfAccount;

use App\Http\Livewire\CustomComponent;

class Item extends CustomComponent
{
	public $account;

	public function delete()
	{
		$this->emit('deleteChartAccount', ['account' => $this->account]);
	}

    public function render()
    {
        return view('livewire.chart-of-account.item');
    }
}
