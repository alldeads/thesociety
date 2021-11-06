<?php

namespace App\Http\Livewire\Tax;

use App\Http\Livewire\CustomComponent;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

use App\Models\Tax;

class Index extends CustomComponent
{
    public $listeners = [
        'refreshTaxParent' => '$refresh'
    ];

    public function mount()
    {
        $this->placeholder = "Search tax name and percentage";
        $this->permission  = "tax";
        $this->export      = "tax-export";
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        return redirect()->route('tax.create');
    }

    public function render()
    {
    	$search = $this->search;
        $limit  = $this->limit ?? 10;
        $from   = $this->from;
        $to     = $this->to;

    	$results = Tax::where('company_id', $this->company_id)
					->where(function (Builder $query) use ($search) {
                        return $query->where('name', 'like', "%" . $search ."%")
                        	->orWhere('percentage', $search);
					});

        if ( !empty($from) ) {
            $results = $results->whereDate('created_at', '>=', $from );
        }

        if ( !empty($to) ) {
            $results = $results->whereDate('created_at', '<=', $to );
        }
                        
        return view('livewire.tax.index', [
            'results' => $results->orderBy('created_at', 'desc')->paginate($limit)
        ]);
    }
}
