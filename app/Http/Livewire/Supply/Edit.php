<?php

namespace App\Http\Livewire\Supply;

use App\Http\Livewire\CustomComponent;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads;

use App\Models\Product;

class Edit extends CustomComponent
{
	public $company_id;
	public $supply;
	public $inputs;

	public function mount()
	{
		$this->inputs = [
			'name'              => $this->supply->name ?? '',
			'sku'               => $this->supply->sku ?? '',
			'description'       => $this->supply->long_description ?? '',
			'cost'              => $this->supply->cost ?? '',
			'quantity'          => $this->supply->quantity ?? '',
			'threshold'         => $this->supply->threshold ?? '',
			'status'            => $this->supply->status ?? '',
		];
	}

	public function submit()
	{
		Validator::make($this->inputs, [
            'name'         => ['required', 'string', 'max:255'],
            'sku'          => ['nullable'],
            'description'  => ['required', 'string', 'max:255'],
            'avatar'       => ['nullable', 'image'],
            'cost'         => ['required', 'numeric'],
            'quantity'     => ['required', 'numeric'],
            'threshold'    => ['required', 'numeric'],
            'status'       => ['required', 'string']
        ])->validate();

        if ( isset($this->inputs['avatar']) ) {
        	$path = Storage::url($this->inputs['avatar']->store('products'));
        }

        if ( !empty($this->inputs['sku']) ) {
        	$results = Product::where([
	        	'company_id' => $this->company_id,
	        	'sku'        => $this->inputs['sku']
	        ])->where('id', '!=', $this->supply->id)->first();

	        if ( $results ) {
	        	return $this->message('Sku has been used.', 'error');
	        }
        }

        try {
			DB::beginTransaction();

			$supply = Product::find($this->supply->id);

	        $supply->fill([
	        	'avatar'     => $path ?? null,
	        	'sku'        => $this->inputs['sku'] ?? null,
	        	'name'       => ucwords($this->inputs['name']),
	        	'long_description' => ucwords($this->inputs['description']),
	        	'quantity'  => $this->inputs['quantity'],
	        	'threshold' => $this->inputs['threshold'] ?? 0,
	        	'cost'      => $this->inputs['cost'],
	        	'updated_by' => auth()->id(),
	        	'status'     => $this->inputs['status'],
	        ]);

	        $supply->save();

	        DB::commit();

	        $this->message('Supply has been updated.', 'success');
        } catch(\Exception $e) {
			DB::rollback();
			$this->message($e->getMessage(), 'error');
		}
	}

    public function render()
    {
        return view('livewire.supply.edit');
    }
}
