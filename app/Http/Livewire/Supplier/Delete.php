<?php

namespace App\Http\Livewire\Supplier;

use App\Http\Livewire\CustomComponent;

use App\Models\Supplier;

class Delete extends CustomComponent
{
	public $listeners = [
        'deleteSupplier' => 'delete'
    ];

    public $item;
    public $el = "delete-supplier-item";

    public function delete($item)
    {
    	$this->item = $item;
    	$this->emit('showModal', ['el' => $this->el]);
    }

    public function confirm()
    {
    	$supp = Supplier::find($this->item['item']['id']);

    	if ( !$supp ) {
    		$this->message('Oops! Something went wrong upon deletion, please try again!', 'error');
    	}

        $supp->updated_by = auth()->id();
        $supp->save();
    	$supp->delete();

    	$this->emit('dissmissModal', ['el' => $this->el]);
    	$this->message('Success! Supplier has been deleted.', 'success');
    	$this->emit('refreshSupplierParent');
    }

    public function render()
    {
        return view('livewire.supplier.delete');
    }
}
