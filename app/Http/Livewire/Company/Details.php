<?php

namespace App\Http\Livewire\Company;

use Livewire\Component;

class Details extends Component
{
	public $company;

	public function mount()
	{
		if ( auth()->user()->empCard ) {
			$this->company = auth()->user()->empCard->company;
		}
	}

    public function render()
    {
        return view('livewire.company.details');
    }
}
