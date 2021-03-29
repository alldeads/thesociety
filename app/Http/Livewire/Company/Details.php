<?php

namespace App\Http\Livewire\Company;

use Livewire\Component;

class Details extends Component
{
	public $company;
	public $employees;

	public function mount()
	{
		if ( auth()->user()->empCard ) {
			$this->company = auth()->user()->empCard->company;
			$this->employees = count($this->company->employees);
		}
	}

    public function render()
    {
        return view('livewire.company.details');
    }
}
