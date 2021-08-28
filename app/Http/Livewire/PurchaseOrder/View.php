<?php

namespace App\Http\Livewire\PurchaseOrder;

use Livewire\Component;

use App\Models\Product;

class View extends Component
{
	public $company;
	public $purchase;
	public $products;
	public $total;
	public $sub_total;
	public $inputs;

	public function mount()
	{
		$this->inputs['reference']     = $this->purchase->reference;
		$this->inputs['purchase_date'] = $this->purchase->purchase_date;
		$this->inputs['expected_on']   = $this->purchase->purchase_date;
		$this->inputs['supplier']      = $this->purchase->supplier->user->profile->company ?? 'N/A';
		$this->inputs['items']         = $this->purchase->items;
		$this->inputs['notes']         = $this->purchase->notes ?? "N/A";
		$this->inputs['approved_by']   = $this->purchase->user_approved->profile->name ?? "N/A";
		$this->inputs['created_by']    = $this->purchase->user_created->profile->name ?? "N/A";
		$this->inputs['subtotal']      = number_format($this->purchase->sub_total, 2, '.', ',');
		$this->inputs['total']         = number_format($this->purchase->total, 2, '.', ',');
		$this->inputs['status']        = ucwords($this->purchase->status->name ?? '');
		$this->inputs['created_at']    = $this->purchase->created_at->format('F j, Y h:i:s a');
		$this->inputs['updated_at']    = $this->purchase->updated_at->format('F j, Y h:i:s a');
		$this->inputs['updated_by']    = $this->purchase->user_updated->profile->name ?? "N/A";
	}

	public function edit()
	{
		return redirect()->route('purchase-orders-edit', ['purchase' => $this->purchase->id]);
	}

    public function render()
    {
        return view('livewire.purchase-order.view');
    }
}
