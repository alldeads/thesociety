<?php

namespace App\Http\Livewire\Supply;

use App\Http\Livewire\CustomComponent;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads;

use App\Models\Product;

class Create extends CustomComponent
{
	use WithFileUploads;

	public $company_id;

	public $inputs = [];

	public function mount()
	{
		$this->inputs['sku'] = Product::generate_sku($this->company_id);
	}

	public function submit()
	{
		Validator::make($this->inputs, [
            'name'         => ['required', 'string', 'max:255'],
            'sku'          => ['required'],
            'description'  => ['required', 'string', 'max:255'],
            'avatar'       => ['nullable', 'image'],
            'cost'         => ['required', 'numeric'],
            'threshold'    => ['nullable', 'numeric'],
            'status'       => ['required', 'string']
        ])->validate();

        if ( isset($this->inputs['avatar']) ) {
        	$path = Storage::url($this->inputs['avatar']->store('products'));
        }

        $results = Product::where([
        	'company_id' => $this->company_id,
        	'sku'        => $this->inputs['sku']
        ])->first();

        if ( $results ) {
        	return $this->message('Supply sku has been used.', 'error');
        }

        try {
			DB::beginTransaction();

	        Product::create([
	        	'company_id' => $this->company_id,
	        	'avatar'     => $path ?? null,
	        	'sku'        => $this->inputs['sku'],
	        	'srp_price'  => 0,
	        	'name'       => ucwords($this->inputs['name']),
	        	'long_description' => ucwords($this->inputs['description'] ?? null),
	        	'threshold' => $this->inputs['threshold'] ?? 0,
	        	'cost'      => $this->inputs['cost'],
	        	'updated_by' => auth()->id(),
	        	'created_by' => auth()->id(),
	        	'type'       => 'supply',
	        	'status'     => $this->inputs['status'],
	        ]);

	        DB::commit();

	        $this->inputs = [];

	        $this->message('Supply has been created', 'success');
        } catch(\Exception $e) {
			DB::rollback();
			$this->message($e->getMessage(), 'error');
		}
	}

    public function render()
    {
        return view('livewire.supply.create');
    }
}
