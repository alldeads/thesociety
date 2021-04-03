<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\CompanyRole;

use Illuminate\Support\Facades\Validator;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

	public $company_id;
	public $search = '';
    public $limit;

    public $listeners = [
        'refreshItemParent' => '$refresh'
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

    	$results = CompanyRole::where('role_name', 'like', "%". $search ."%")
        ->where('company_id', $this->company_id)
    	->where('role_name', 'not like', "%owner%")
        ->orderBy('id', 'desc')
    	->paginate($this->limit);
    	
        return view('livewire.role.index', [
        	'results' => $results
        ]);
    }
}
