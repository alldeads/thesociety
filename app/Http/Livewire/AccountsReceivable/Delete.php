<?php

namespace App\Http\Livewire\AccountsReceivable;

use App\Http\Livewire\CustomComponent;

use App\Models\AccountsReceivable;

class Delete extends CustomComponent
{
    public $listeners = [
        'deleteAccountsReceivableItem' => 'delete'
    ];

    public $receivable;
    public $el = "delete-accounts-receivable-item";

    public function delete($receivable)
    {
    	$this->receivable = $receivable;
    	$this->emit('showModal', ['el' => $this->el]);
    }

    public function confirm()
    {
    	$acc = AccountsReceivable::find($this->receivable['receivable']['id']);

    	if ( !$acc ) {
    		$this->emit('dissmissModal', ['el' => $this->el]);
    		return $this->message('Oops! Something went wrong upon deletion, please try again!', 'error');
    	}

        $acc->updated_by = auth()->id();
        $acc->save();
    	$acc->delete();

    	$this->emit('dissmissModal', ['el' => $this->el]);
    	$this->message('Success! Accounts Receivable has been deleted.', 'success');
    	$this->emit('refreshAccountsReceivableParent');
    	$this->emit('refreshAccountsReceivableItem');
    }

    public function render()
    {
        return view('livewire.accounts-receivable.delete');
    }
}
