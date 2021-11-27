<?php

namespace App\Http\Livewire\AccountsPayable;

use App\Http\Livewire\CustomComponent;

use App\Models\AccountsPayable;

class Delete extends CustomComponent
{
    public $listeners = [
        'deleteAccountsPayableItem' => 'delete'
    ];

    public $payable;
    public $el = "delete-accounts-payable-item";

    public function delete($payable)
    {
    	$this->payable = $payable;
    	$this->emit('showModal', ['el' => $this->el]);
    }

    public function confirm()
    {
    	$acc = AccountsPayable::find($this->payable['payable']['id']);

    	if ( !$acc ) {
    		$this->emit('dissmissModal', ['el' => $this->el]);
    		return $this->message('Oops! Something went wrong upon deletion, please try again!', 'error');
    	}

        $acc->updated_by = auth()->id();
        $acc->save();
    	$acc->delete();

    	$this->emit('dissmissModal', ['el' => $this->el]);
    	$this->message('Success! Accounts Payable has been deleted.', 'success');
    	$this->emit('refreshAccountsPayableParent');
    	$this->emit('refreshAccountsPayableItem');
    }

    public function render()
    {
        return view('livewire.accounts-payable.delete');
    }
}
