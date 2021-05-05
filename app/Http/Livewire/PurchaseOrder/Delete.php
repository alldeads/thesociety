<?php

namespace App\Http\Livewire\PurchaseOrder;

use App\Http\Livewire\CustomComponent;

use App\Models\PurchaseOrder;

class Delete extends CustomComponent
{
	public $listeners = [
        'deletePurchaseOrderItem' => 'delete'
    ];

    public $purchase;
    public $el = "delete-purchase-order-item";

    public function delete($purchase)
    {
    	$this->purchase = $purchase;
    	$this->emit('showModal', ['el' => $this->el]);
    }

    public function confirm()
    {
    	$acc = PurchaseOrder::find($this->purchase['purchase']['id']);

    	if ( !$acc ) {
    		$this->message('Oops! Something went wrong upon deletion, please try again!', 'error');
    	}

        $acc->updated_by = auth()->id();
        $acc->save();
    	$acc->delete();

    	$this->emit('dissmissModal', ['el' => $this->el]);
    	$this->message('Success! Purchase Order has been deleted.', 'success');
    	$this->emit('refreshPurchaseOrderParent');
    }

    public function render()
    {
        return view('livewire.purchase-order.delete');
    }
}
