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
    public $date_from;
    public $date_to;

    public $listeners = [
        'refreshPurchaseOrderParent' => '$refresh'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        return redirect()->route('purchase-orders-create');
    }

    public function render()
    {
    	$search = $this->search;
        $from   = $this->date_from;
        $to     = $this->date_to;
        $limit  = $this->limit ?? 10;

    	$results = PurchaseOrder::where('company_id', $this->company_id)
    				->where( function (Builder $query) use ($search) {
		                return $query->where('reference', 'like', "%". $search . "%")
		                	->orWhereHas('status', function($query) use ($search) {
                                return $query->where('name', 'like', "%" . $search ."%");
                            })
                            ->orWhereHas('supplier', function($query) use ($search) {
                                return $query->whereHas('user.profile', function($query) use ($search) {
                                    return $query->where('company', 'like', "%" . $search ."%");
                                });
                            });
		            });
                    
        if ( !empty($from) ) {
            $results = $results->whereDate('created_at', '>=', $from );
        }

        if ( !empty($to) ) {
            $results = $results->whereDate('created_at', '<=', $to );
        }            

        $results  =  $results->with(['supplier.user.profile', 'status', 'user_approved.profile'])
                            ->orderBy('id', 'desc')
                            ->paginate($limit);
                        
        return view('livewire.purchase-order.index', [
            'results' => $results
        ]);
    }
}
