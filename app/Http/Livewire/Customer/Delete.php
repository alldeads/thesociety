<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Http\Livewire\CustomComponent;

use App\Models\Customer;

class Delete extends CustomComponent
{
	public $listeners = [
        'deleteCustomer' => 'delete'
    ];

    public $item;
    public $el = "delete-customer-item";

    public function delete($item)
    {
    	$this->item = $item;
    	$this->emit('showModal', ['el' => $this->el]);
    }

    public function confirm()
    {
    	$cus = Customer::find($this->item['item']['id']);

    	if ( !$cus ) {
    		$this->message('Oops! Something went wrong upon deletion, please try again!', 'error');
    	}

        $cus->updated_by = auth()->id();
        $cus->save();
    	$cus->delete();

    	$this->emit('dissmissModal', ['el' => $this->el]);
    	$this->message('Success! Customer has been deleted.', 'success');
    	$this->emit('refreshCustomerParent');
    }

    public function render()
    {
        return view('livewire.customer.delete');
    }
}
