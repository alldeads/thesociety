<?php

namespace App\Http\Livewire\StockLevel;

use App\Http\Livewire\CustomComponent;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

use App\Models\StockLevel;

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
        'refreshStockLevelParent' => '$refresh'
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

        $results = StockLevel::where('company_id', $this->company_id)
                    ->where( function (Builder $query) use ($search) {
                        return $query->where('reference', 'like', "%". $search . "%")
                            ->orWhere('notes', 'like', "%". $search . "%")
                            ->orWhereHas('product', function($query) use ($search) {
                                return $query->where('name', 'like', "%" . $search ."%");
                            })
                            ->orWhereHas('branch', function($query) use ($search) {
                                return $query->where('name', 'like', "%" . $search ."%");
                            })
                            ->orWhereHas('type', function($query) use ($search) {
                                return $query->where('name', 'like', "%" . $search ."%");
                            });
                    });
                    
        if ( !empty($from) ) {
            $results = $results->whereDate('created_at', '>=', $from );
        }

        if ( !empty($to) ) {
            $results = $results->whereDate('created_at', '<=', $to );
        }            

        $results  =  $results->with(['product', 'branch', 'type'])
                            ->orderBy('id', 'desc')
                            ->paginate($limit);
                        
        return view('livewire.stock-level.index', [
            'results' => $results
        ]);
    }
}
