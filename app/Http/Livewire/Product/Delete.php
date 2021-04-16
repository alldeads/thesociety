<?php

namespace App\Http\Livewire\Product;

use App\Http\Livewire\CustomComponent;

use App\Models\Product;

class Delete extends CustomComponent
{
	public $listeners = [
        'deleteProduct' => 'delete'
    ];

    public $item;
    public $el = "delete-product-item";

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
    	$this->message('Success! Product has been deleted.', 'success');
    	$this->emit('refreshCustomerParent');
    }

    public function render()
    {
        return view('livewire.product.delete');
    }
}
