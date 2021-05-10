<?php

namespace App\Http\Livewire\PurchaseOrder;

use Livewire\Component;

class View extends Component
{
	public $company;
	public $purchase;
	public $inputs;

	public function mount()
	{
		$this->inputs['reference'] = $this->purchase->reference;
		$this->inputs['purchase_date'] = $this->purchase->purchase_date;

		$this->inputs['supplier_name']    = $this->purchase->supplier->user->profile->company ?? 'N/A';
		$this->inputs['supplier_address'] = $this->purchase->supplier->address ?? [];
		$this->inputs['supplier_phone'] = $this->purchase->supplier->user->profile->phone_number ?? null;
		$this->inputs['supplier_email'] = $this->purchase->supplier->user->email;

		$this->inputs['ship_to_name']  = $this->purchase->user_shipped->profile->name ?? 'N/A';
		$this->inputs['items'] = $this->purchase->items;
		$this->inputs['notes'] = $this->purchase->notes ?? "N/A";
		$this->inputs['ship_via'] = $this->purchase->ship_via ?? "N/A";
		$this->inputs['shipping_method'] = $this->purchase->shipping_method ?? "N/A";
		$this->inputs['shipping_terms'] = $this->purchase->shipping_terms ?? "N/A";
		$this->inputs['approved_by'] = $this->purchase->user_approved->profile->name ?? "N/A";
		$this->inputs['created_by'] = $this->purchase->user_created->profile->name ?? "N/A";

		$this->inputs['sub_total'] = $this->purchase->sub_total;
		$this->inputs['total'] = $this->purchase->total;
		$this->inputs['fixed'] = $this->purchase->fixed;
		$this->inputs['shipping'] = $this->purchase->shipping;
		$this->inputs['discount'] = $this->purchase->discount;
		$this->inputs['tax'] = $this->purchase->tax;
	}

	public function download()
	{
		$pdf = \PDF::loadView('purchase-order.download');

		return $pdf->stream();
	}

    public function render()
    {
        return view('livewire.purchase-order.view');
    }
}
