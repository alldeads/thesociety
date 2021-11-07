<?php

namespace App\Http\Livewire\Sale;

use App\Http\Livewire\CustomComponent;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

use App\Models\SalesOrder;

class Index extends CustomComponent
{
    public $listeners = [
        'refreshSalesOrderParent' => '$refresh'
    ];

    public function mount()
    {
        $this->placeholder = "Search reference, customer name, or phone number";
        $this->permission  = "sale";
        $this->export      = "orders-export";
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        return redirect()->route('orders.create');
    }

    public function render()
    {
        $search = $this->search;
        $from   = $this->from;
        $to     = $this->to;
        $limit  = $this->limit ?? 10;

        $results = SalesOrder::where('company_id', $this->company_id)
                        ->where( function (Builder $query) use ($search) {
                        return $query->where('reference', 'like', "%". $search . "%")
                            ->orWhere('type', 'like', "%". $search . "%")
                            ->orWhereHas('customer', function($query) use ($search) {
                            return $query->whereHas('user', function($query) use ($search) {
                                return $query->whereHas('profile', function($query) use ($search) {
                                    return $query->where('first_name', 'like', "%" . $search ."%")
                                                ->orWhere('middle_name', 'like', "%" . $search ."%")
                                                ->orWhere('last_name', 'like', "%" . $search ."%")
                                                ->orWhere('phone_number', $search);
                                    });
                                });
                            });
                        });
                    
        if ( !empty($from) ) {
            $results = $results->whereDate('created_at', '>=', $from );
        }

        if ( !empty($to) ) {
            $results = $results->whereDate('created_at', '<=', $to );
        }            

        $results  =  $results->with(['customer.user.profile'])
                            ->orderBy('created_at', 'desc')
                            ->paginate($limit);
                        
        return view('livewire.sale.index', [
            'results' => $results
        ]);
    }
}
