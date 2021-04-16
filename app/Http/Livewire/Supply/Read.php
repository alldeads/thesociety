<?php

namespace App\Http\Livewire\Supply;

use Livewire\Component;

class Read extends Component
{
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
			'created_at'        => $this->supply->created_at->format('F, j Y h:i:s a') ?? '',
			'updated_at'        => $this->supply->updated_at->format('F, j Y h:i:s a') ?? '',
			'created_by'        => ucwords($this->supply->user_created->profile->name) ?? '',
			'updated_by'        => ucwords($this->supply->user_updated->profile->name) ?? '',
		];
	}

    public function render()
    {
        return view('livewire.supply.read');
    }
}
