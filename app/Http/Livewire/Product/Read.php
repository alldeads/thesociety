<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

class Read extends Component
{
	public $product;

	public $inputs;

	public function mount()
	{
		$this->inputs = [
			'name'              => $this->product->name ?? '',
			'sku'               => $this->product->sku ?? '',
			'description'       => $this->product->long_description ?? '',
			'brief_description' => $this->product->short_description ?? '',
			'cost'              => $this->product->cost ?? '',
			'price'             => $this->product->srp_price ?? '',
			'discounted'        => $this->product->discounted_price ?? '',
			'quantity'          => $this->product->quantity ?? '',
			'threshold'         => $this->product->threshold ?? '',
			'status'            => $this->product->status ?? '',
			'mark_up'           => $this->product->markup ?? '',
			'created_at'        => $this->product->created_at->format('F, j Y h:i:s a') ?? '',
			'updated_at'        => $this->product->updated_at->format('F, j Y h:i:s a') ?? '',
			'created_by'        => ucwords($this->product->user_created->profile->name) ?? '',
			'updated_by'        => ucwords($this->product->user_updated->profile->name) ?? '',
		];
	}

    public function render()
    {
        return view('livewire.product.read');
    }
}
