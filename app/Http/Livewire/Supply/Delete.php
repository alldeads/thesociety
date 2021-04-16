<?php

namespace App\Http\Livewire\Supply;

use App\Http\Livewire\CustomComponent;

use App\Models\Product;

class Delete extends CustomComponent
{
	public $listeners = [
        'deleteSupply' => 'delete'
    ];

    public $item;
    public $el = "delete-supply-item";

    public function delete($item)
    {
    	$this->item = $item;
    	$this->emit('showModal', ['el' => $this->el]);
    }

    public function confirm()
    {
    	$prod = Product::find($this->item['item']['id']);

    	if ( !$prod ) {
    		$this->message('Oops! Something went wrong upon deletion, please try again!', 'error');
    	}

        $prod->updated_by = auth()->id();
        $prod->save();
    	$prod->delete();

    	$this->emit('dissmissModal', ['el' => $this->el]);
    	$this->message('Success! Supply has been deleted.', 'success');
    	$this->emit('refreshSupplyParent');
    }

    public function render()
    {
        return view('livewire.supply.delete');
    }
}
