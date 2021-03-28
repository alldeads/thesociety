<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;

use App\Models\CompanyRole;

use Illuminate\Support\Facades\Validator;

class Index extends Component
{
	public $company_id;
	public $search = '';

	public function mount()
	{
		$this->company_id = auth()->user()->empCard->company_id;
	}

    public function render()
    {
    	$search = $this->search;

    	$results = CompanyRole::whereHas('role', function($q) use ($search) {
    		return $q->where('name', 'like', "%". $search ."%");
    	})->where('company_id', $this->company_id)
    	->where('role_id', '!=', 1)
    	->get();
    	
        return view('livewire.role.index', [
        	'results' => $results
        ]);
    }
}
