<?php

namespace App\Http\Livewire\Product;

use App\Http\Livewire\CustomComponent;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads;

use App\Models\Product;

class Create extends CustomComponent
{
	public $company_id;

	public $mark_up;
	public $margin;

	public $inputs = [
		'cost',
		'avatar'
	];

	public function mount()
	{
		$this->inputs['cost']  = 0;
		$this->inputs['price'] = 0;
		$this->inputs['sku'] = Product::generate_sku($this->company_id);

		$this->mark_up = 0;
		$this->margin  = 0;
	}

	public function calculate()
	{
		$srp  = (int) ($this->inputs['price'] ?? 0);
		$cost = (int) ($this->inputs['cost'] ?? 0);

		if ( $srp > 0 && $cost > 0 ) {
			$this->mark_up = number_format((($srp - $cost) / $cost) * 100, 2, '.', ',');
			$this->margin  = number_format((($srp - $cost) / $srp) * 100, 2, '.', ',');
		}
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
	        ])->first();

	        if ( $results ) {
	        	return $this->message('Product sku has been used.', 'error');
	        }
	    }

        try {
			DB::beginTransaction();

	        Product::create([
	        	'company_id' => $this->company_id,
	        	'avatar'     => $path ?? null,
	        	'sku'        => $this->inputs['sku'] ?? null,
	        	'name'       => ucwords($this->inputs['name']),
	        	'long_description' => ucwords($this->inputs['description']),
	        	'short_description' => ucwords($this->inputs['brief_description']),
	        	'threshold' => $this->inputs['threshold'] ?? 0,
	        	'srp_price' => $this->inputs['price'],
	        	'discounted_price' => $this->inputs['discounted'] ?? 0,
	        	'cost'      => $this->inputs['cost'],
	        	'updated_by' => auth()->id(),
	        	'created_by' => auth()->id(),
	        	'type'       => 'product',
	        	'status'     => $this->inputs['status'],
	        ]);

	        DB::commit();

	        $this->inputs = [];

	        $this->message('Product has been created', 'success');
        } catch(\Exception $e) {
			DB::rollback();
			$this->message($e->getMessage(), 'error');
		}
	}

    public function render()
    {
    	$this->calculate();

        return view('livewire.product.create');
    }
}
