<?php

namespace App\Http\Livewire\Product;

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
        'refreshProductParent' => '$refresh'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        return redirect()->route('suppliers-create');
    }

    public function render()
    {
    	$search = $this->search;

    	$results = Product::where('company_id', $this->company_id)
    				->where('type', 'product')
    				->where( function (Builder $query) use ($search) {
		                return $query->where('name', 'like', "%". $search . "%")
		                	->orWhere('status', 'like', "%". $search . "%");
		            })->orderBy('id', 'desc')->paginate($this->limit);
                        
        return view('livewire.product.index', [
            'results' => $results
        ]);
    }
}
