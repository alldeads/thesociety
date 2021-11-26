<?php

namespace App\Http\Livewire\Expense;

use App\Http\Livewire\CustomComponent;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Expense;

class Index extends CustomComponent
{
    public $listeners = [
        'refreshExpenseParent' => '$refresh'
    ];

    public function mount()
    {
        $this->placeholder = "Search title, description, notes, payee, or payor";
        $this->permission  = "expense";
        $this->export      = "expense-export";
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        return redirect()->route('expenses.create');
    }

    public function render()
    {
    	$search = $this->search ?? '';
        $from   = $this->from;
        $to     = $this->to;
        $limit  = $this->limit ?? 10;

    	$results = Expense::where('company_id', $this->company_id)
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
                        
        return view('livewire.expense.index', [
            'results' => $results
        ]);
    }
}
