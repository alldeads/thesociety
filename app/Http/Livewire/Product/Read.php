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
			'cost'              => number_format($this->product->cost ?? 0, 2, '.', ','),
			'srp'               => number_format($this->product->srp_price ?? 0, 2, '.', ','),
			'discounted'        => $this->product->discounted_price ?? '',
			'quantity'          => $this->product->quantity ?? '',
			'threshold'         => $this->product->threshold ?? '',
			'status'            => ucwords($this->product->status ?? ''),
			'margin'            => number_format($this->product->margin ?? 0, 2, '.', ','),
			'mark_up'           => number_format($this->product->mark_up ?? 0, 2, '.', ','),
			'created_at'        => $this->product->created_at->format('F, j Y h:i:s a') ?? '',
			'updated_at'        => $this->product->updated_at->format('F, j Y h:i:s a') ?? '',
			'created_by'        => ucwords($this->product->user_created->profile->name) ?? '',
			'updated_by'        => ucwords($this->product->user_updated->profile->name) ?? '',
		];
	}

	public function edit()
	{
		return redirect()->route('products-edit', ['product' => $this->product->id]);
	}

    public function render()
    {
        return view('livewire.product.read');
    }
}
