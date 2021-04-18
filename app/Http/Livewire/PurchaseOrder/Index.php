<?php

namespace App\Http\Livewire\PurchaseOrder;

use App\Http\Livewire\CustomComponent;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

use App\Models\PurchaseOrder;

class Index extends CustomComponent
{
	use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $company_id;
    public $search = '';
    public $limit;

    public $listeners = [
        'refreshPurchaseOrderParent' => '$refresh'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        return redirect()->route('products-create');
    }

    public function render()
    {
    	$search = $this->search;

    	$results = PurchaseOrder::where('company_id', $this->company_id)
    				->where( function (Builder $query) use ($search) {
		                return $query->where('reference', 'like', "%". $search . "%")
		                	->orWhereHas('status', function($query) use ($search) {
                                return $query->where('name', 'like', "%" . $search ."%");
                            });
		            })->orderBy('id', 'desc')->paginate($this->limit);
                        
        return view('livewire.purchase-order.index', [
            'results' => $results
        ]);
    }
}
