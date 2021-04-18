<?php

namespace App\Http\Livewire\Company;

use Livewire\Component;

class Details extends Component
{
	public $company;
	public $employees;
	public $branches;
	public $products;
	public $supplies;

	public function mount()
	{
		$this->employees = count($this->company->employees);
		$this->branches  = 1;
		$this->products  = count($this->company->products()->product()->get());
		$this->supplies  = count($this->company->products()->supply()->get());
 	}

    public function render()
    {
        return view('livewire.company.details');
    }
}
