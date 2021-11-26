<?php

namespace App\Http\Livewire\Expense;

use App\Http\Livewire\CustomComponent;

use App\Models\Expense;

class Delete extends CustomComponent
{
    public $listeners = [
        'deleteExpenseItem' => 'delete'
    ];

    public $expense;
    public $el = "delete-expense-item";

    public function delete($expense)
    {
    	$this->expense = $expense;
    	$this->emit('showModal', ['el' => $this->el]);
    }

    public function confirm()
    {
    	$acc = Expense::find($this->expense['expense']['id']);

    	if ( !$acc ) {
    		$this->emit('dissmissModal', ['el' => $this->el]);
    		return $this->message('Oops! Something went wrong upon deletion, please try again!', 'error');
    	}

        $acc->updated_by = auth()->id();
        $acc->save();
    	$acc->delete();

    	$this->emit('dissmissModal', ['el' => $this->el]);
    	$this->message('Success! Expense has been deleted.', 'success');
    	$this->emit('refreshExpenseParent');
    	$this->emit('refreshExpenseItem');
    }

    public function render()
    {
        return view('livewire.expense.delete');
    }
}
