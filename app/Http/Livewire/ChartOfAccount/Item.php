<?php

namespace App\Http\Livewire\ChartOfAccount;

use App\Http\Livewire\CustomComponent;

class Item extends CustomComponent
{
	public $account;

	public $listeners = [
        'refreshChartItem' => '$refresh'
    ];

	public function delete()
	{
		$this->emit('deleteChartAccount', ['account' => $this->account]);
	}

	public function edit()
	{
		return redirect()->route('chart-accounts.edit', [$this->account->id]);
	}

	public function read()
	{
		return redirect()->route('chart-accounts.show', [$this->account->id]);
	}

    public function render()
    {
        return view('livewire.chart-of-account.item');
    }
}
