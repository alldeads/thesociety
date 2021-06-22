<?php

namespace App\Http\Livewire\Tax;

use App\Http\Livewire\CustomComponent;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

use App\Models\Tax;

class Index extends CustomComponent
{
	use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $company_id;
    public $search = '';
    public $limit;

    public $listeners = [
        'refreshTaxParent' => '$refresh'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
    	$search = $this->search;

    	$results = Tax::where('company_id', $this->company_id)
					->where(function (Builder $query) use ($search) {
                        return $query->where('name', 'like', "%" . $search ."%")
                        	->orWhere('percentage', $search);
					})->orderBy('name', 'asc')->paginate($this->limit);
                        
        return view('livewire.tax.index', [
            'results' => $results
        ]);
    }
}
