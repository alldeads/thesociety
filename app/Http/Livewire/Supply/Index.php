<?php

namespace App\Http\Livewire\Supply;

use App\Http\Livewire\CustomComponent;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

use App\Models\Product;

class Index extends CustomComponent
{
	use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $company_id;
    public $search = '';
    public $limit;

    public $listeners = [
        'refreshSupplyParent' => '$refresh'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        return redirect()->route('supplies-create');
    }

    public function render()
    {
    	$search = $this->search;

    	$results = Product::where('company_id', $this->company_id)
    				->where('type', 'supply')
    				->where( function (Builder $query) use ($search) {
		                return $query->where('name', 'like', "%". $search . "%")
		                	->orWhere('status', 'like', "%". $search . "%");
		            })->orderBy('id', 'desc')->paginate($this->limit);
                        
        return view('livewire.supply.index', [
            'results' => $results
        ]);
    }
}
