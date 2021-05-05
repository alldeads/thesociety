<?php

namespace App\Http\Livewire\PurchaseOrder;

use App\Http\Livewire\CustomComponent;

use App\Models\PurchaseOrder;
use App\Models\Status;

class Item extends CustomComponent
{
	public $item;

	public function approve()
	{
		$po = PurchaseOrder::find($this->item->id);
		$status = Status::where('name', 'approved')->first();

		$po->status_id = $status->id;
		$po->updated_by = auth()->id();
		$po->save();

		$this->item = $po;

		$this->emitSelf('$refresh');

		$this->message('Success! Purchase Order has been approved.', 'success');
	}

	public function delete()
	{
		$this->emit('deletePurchaseOrderItem', ['purchase' => $this->item]);
	}

	public function read()
	{
		return redirect()->route('purchase-orders-read', ['purchase' => $this->item->id]);
	}

	public function edit()
	{
		return redirect()->route('purchase-orders-edit', ['purchase' => $this->item->id]);
	}
	
    public function render()
    {
        return view('livewire.purchase-order.item');
    }
}
