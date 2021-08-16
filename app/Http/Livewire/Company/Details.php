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
		$this->employees = $this->company->employees()->count();
		$this->branches  = $this->company->branches()->count();
		$this->products  = $this->company->products()->product()->count();
		$this->supplies  = $this->company->products()->supply()->count();
 	}

    public function render()
    {
        return view('livewire.company.details');
    }
}
