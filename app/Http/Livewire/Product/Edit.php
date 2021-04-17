<?php

namespace App\Http\Livewire\Product;

use App\Http\Livewire\CustomComponent;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads;

use App\Models\Product;

class Edit extends CustomComponent
{
	use WithFileUploads;
	
	public $company_id;
	public $product;
	public $inputs;
	public $mark_up;

	public function mount()
	{
		$this->inputs = [
			'name'              => $this->product->name ?? '',
			'sku'               => $this->product->sku ?? '',
			'description'       => $this->product->long_description ?? '',
			'brief_description' => $this->product->short_description ?? '',
			'cost'              => $this->product->cost ?? 0,
			'price'             => $this->product->srp_price ?? 0,
			'discounted'        => $this->product->discounted_price ?? 0,
			'quantity'          => $this->product->quantity ?? 0,
			'threshold'         => $this->product->threshold ?? 0,
			'status'            => $this->product->status ?? ''
		];

		$this->mark_up = $this->product->markup ?? 0;
	}

	public function submit()
	{
		Validator::make($this->inputs, [
            'name'         => ['required', 'string', 'max:255'],
            'sku'          => ['nullable'],
            'description'  => ['required', 'string', 'max:255'],
            'brief_description' => ['required', 'string', 'max:30'],
            'avatar'       => ['nullable', 'image'],
            'cost'         => ['required', 'numeric'],
            'price'        => ['required', 'numeric'],
            'discounted'   => ['nullable', 'numeric'],
            'quantity'     => ['required', 'numeric'],
            'threshold'    => ['nullable', 'numeric'],
            'status'       => ['required', 'string']
        ])->validate();

        if ( isset($this->inputs['avatar']) ) {
        	$path = Storage::url($this->inputs['avatar']->store('products'));
        }

        if ( !empty($this->inputs['sku']) ) {
	        $results = Product::where([
	        	'company_id' => $this->company_id,
	        	'sku'        => $this->inputs['sku']
	        ])->where('id', '!=', $this->product->id)->first();

	        if ( $results ) {
	        	return $this->message('Product sku has been used.', 'error');
	        }
	    }

        try {
			DB::beginTransaction();

			$product = Product::find($this->product->id);

	        $product->fill([
	        	'avatar'     => $path ?? null,
	        	'sku'        => $this->inputs['sku'] ?? null,
	        	'name'       => ucwords($this->inputs['name']),
	        	'long_description' => ucwords($this->inputs['description']),
	        	'short_description' => ucwords($this->inputs['brief_description']),
	        	'quantity'  => $this->inputs['quantity'],
	        	'threshold' => $this->inputs['threshold'] ?? 0,
	        	'srp_price' => $this->inputs['price'],
	        	'discounted_price' => $this->inputs['discounted'] ?? 0,
	        	'cost'      => $this->inputs['cost'],
	        	'markup'    => str_replace(',', '', $this->mark_up),
	        	'updated_by' => auth()->id(),
	        	'type'       => 'product',
	        	'status'     => $this->inputs['status'],
	        ]);

	        $product->save();

	        DB::commit();

	        $this->message('Product has been updated.', 'success');
        } catch(\Exception $e) {
			DB::rollback();
			$this->message($e->getMessage(), 'error');
		}
	}

	public function calculate()
	{
		$srp  = (int) ($this->inputs['price'] ?? 0);
		$cost = (int) ($this->inputs['cost'] ?? 0);

		if ( $srp > 0 && $cost > 0 ) {
			$this->mark_up = number_format((($srp - $cost) / $cost) * 100, 2, '.', ',');
		}
	}

    public function render()
    {
    	$this->calculate();
        return view('livewire.product.edit');
    }
}
