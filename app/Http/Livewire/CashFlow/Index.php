<?php

namespace App\Http\Livewire\CashFlow;

use App\Http\Livewire\CustomComponent;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

use App\Models\CashFlow;

class Index extends CustomComponent
{
	use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $company_id;
    public $search = '';
    public $limit;

    public $listeners = [
        'refreshCashFlowParent' => '$refresh'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
    	$search = $this->search;

    	$results = CashFlow::where('company_id', $this->company_id)
					->orderBy('id', 'desc')->paginate($this->limit);
                        
        return view('livewire.cash-flow.index', [
            'results' => $results
        ]);
    }
}
