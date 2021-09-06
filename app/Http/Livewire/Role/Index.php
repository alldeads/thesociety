<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
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

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
    	$search = $this->search ?? '';
        $limit  = $this->limit ?? 10;

        $results = CompanyRole::where('company_id', $this->company_id)
                        ->where('role_name', 'not like', "%owner%")
                        ->where(function (Builder $query) use ($search) {
                            return $query->where('role_name', 'like', "%". $search ."%");
                        })->orderBy('id', 'desc')
                        ->paginate($limit);
    	
        return view('livewire.role.index', [
        	'results' => $results
        ]);
    }
}
