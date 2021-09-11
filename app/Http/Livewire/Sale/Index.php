<?php

namespace App\Http\Livewire\Sale;

use App\Http\Livewire\CustomComponent;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

use App\Models\SalesOrder;

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
        'refreshSalesOrderParent' => '$refresh'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        return redirect()->route('sales-create');
    }

    public function render()
    {
        $search = $this->search;
        $from   = $this->date_from;
        $to     = $this->date_to;
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
                            ->orderBy('updated_at', 'desc')
                            ->paginate($limit);
                        
        return view('livewire.sale.index', [
            'results' => $results
        ]);
    }
}
