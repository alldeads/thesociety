<?php

namespace App\Http\Livewire\Employee;

use App\Http\Livewire\CustomComponent;
use Livewire\WithPagination;

use App\Models\Employee;

class Index extends CustomComponent
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

	public $company_id;
	public $search = '';
    public $limit;

    public $listeners = [
        'refreshEmployeeParent' => '$refresh'
    ];

	public function mount()
	{
		$this->company_id = auth()->user()->empCard->company_id;
	}

    public function updatingSearch()
    {
        $this->resetPage();
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
    	})->orderBy('created_at', 'desc')->paginate($this->limit);
    	
        return view('livewire.employee.index', [
        	'results' => $results
        ]);
    }
}
