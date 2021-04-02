<?php

namespace App\Http\Livewire\Employee;

use Livewire\Component;

use App\Models\Employee;

class Index extends Component
{
	public $company_id;
	public $search = '';

    public $listeners = [
        'refreshEmployeeParent' => '$refresh'
    ];

	public function mount()
	{
		$this->company_id = auth()->user()->empCard->company_id;
	}

	public function render()
    {
    	$search = $this->search;

    	$results = Employee::whereHas('user', function($query) use ($search) {
    		return $query->where('first_name', 'like', "%" . $search ."%")
    			->orWhere('last_name', 'like', "%" . $search ."%")
    			->orWhere('email', 'like', "%" . $search ."%");
    	})->orWhereHas('role', function($query) use ($search) {
    		return $query->where('role_name', 'like', "%" . $search ."%");
    	})->orderBy('created_at', 'desc')->get();
    	
        return view('livewire.employee.index', [
        	'results' => $results
        ]);
    }
}
