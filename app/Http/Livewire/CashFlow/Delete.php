<?php

namespace App\Http\Livewire\CashFlow;

use App\Http\Livewire\CustomComponent;

use App\Models\CashFlow;

class Delete extends CustomComponent
{
	public $listeners = [
        'deleteCashFlowItem' => 'delete'
    ];

    public $cashflow;
    public $last;
    public $el = "delete-cash-flow-item";

    public function delete($cashflow)
    {
    	$this->cashflow = $cashflow;
    	$this->last = CashFlow::getCompanyLastEntry();
    	$this->emit('showModal', ['el' => $this->el]);
    }

    public function confirm()
    {
    	$acc = CashFlow::find($this->cashflow['cashflow']['id']);

    	if ( !$acc ) {
    		$this->emit('dissmissModal', ['el' => $this->el]);
    		return $this->message('Oops! Something went wrong upon deletion, please try again!', 'error');
    	}

    	if ( $this->last->id != $acc->id ) {
    		$this->emit('dissmissModal', ['el' => $this->el]);
    		return $this->message('Oops! Something went wrong upon deletion, please try again!', 'error');
    	}

        $acc->updated_by = auth()->id();
        $acc->save();
    	$acc->delete();

        cache()->forget('app-cash-flow-last');

    	$this->emit('dissmissModal', ['el' => $this->el]);
    	$this->message('Success! Entry has been deleted.', 'success');
    	$this->emit('refreshCashFlowParent');
    	$this->emit('refreshCashFlowItem');
    }

    public function render()
    {
        return view('livewire.cash-flow.delete');
    }
}
