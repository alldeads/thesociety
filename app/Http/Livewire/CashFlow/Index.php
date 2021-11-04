<?php

namespace App\Http\Livewire\CashFlow;

use App\Http\Livewire\CustomComponent;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

use App\Models\CashFlow;

class Index extends CustomComponent
{
    public $listeners = [
        'refreshCashFlowParent' => '$refresh'
    ];

    public function mount()
    {
        $this->placeholder = "Search account title, type, payee, or payor";
        $this->permission  = "cashflow";
        $this->export      = "cash-flow-export";
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        return redirect()->route('cash-flow.create');
    }

    public function render()
    {
    	$search = $this->search ?? '';
        $from   = $this->from;
        $to     = $this->to;
        $limit  = $this->limit ?? 10;

    	$results = CashFlow::where('company_id', $this->company_id)
                    ->where( function (Builder $query) use ($search) {
                        $query->whereHas('user', function($query) use ($search) {
                            return $query->whereHas('profile', function($query) use ($search) {
                                return $query->where('first_name', 'like', "%" . $search ."%")
                                ->orWhere('middle_name', 'like', "%" . $search ."%")
                                ->orWhere('last_name', 'like', "%" . $search ."%");
                            });
                        })->orWhereHas('chart_account', function($query) use ($search) {
                            return $query->where('chart_name', 'like', "%" . $search ."%")
                            ->orWhereHas('type', function($query) use ($search) {
                                return $query->where('name', 'like', "%" . $search ."%");
                            });
                        });
                    });

        if ( !empty($from) ) {
            $results = $results->whereDate('created_at', '>=', $from );
        }

        if ( !empty($to) ) {
            $results = $results->whereDate('created_at', '<=', $to );
        }

        $results = $results->orderBy('id', 'desc')
                    ->with(['user.profile', 'chart_account.type'])
                    ->paginate($limit);
                        
        return view('livewire.cash-flow.index', [
            'results' => $results
        ]);
    }
}
