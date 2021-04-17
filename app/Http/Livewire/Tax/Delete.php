<?php

namespace App\Http\Livewire\Tax;

use App\Http\Livewire\CustomComponent;

use App\Models\Tax;

class Delete extends CustomComponent
{
	public $listeners = [
        'deleteTaxItem' => 'delete'
    ];

    public $item;
    public $el = "delete-tax-item";

    public function delete($item)
    {
    	$this->item = $item;
    	$this->emit('showModal', ['el' => $this->el]);
    }

    public function confirm()
    {
    	$tax = Tax::find($this->item['item']['id']);

    	if ( !$tax ) {
    		$this->message('Oops! Something went wrong upon deletion, please try again!', 'error');
    	}

        $tax->updated_by = auth()->id();
        $tax->save();
    	$tax->delete();

    	$this->emit('dissmissModal', ['el' => $this->el]);
    	$this->message('Success! Tax has been deleted.', 'success');
    	$this->emit('refreshTaxParent');
    }

    public function render()
    {
        return view('livewire.tax.delete');
    }
}
