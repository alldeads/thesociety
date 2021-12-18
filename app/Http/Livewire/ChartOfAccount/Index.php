<?php

namespace App\Http\Livewire\ChartOfAccount;

use Carbon\Carbon;
use App\Http\Livewire\CustomComponent;
use Illuminate\Database\Eloquent\Builder;

use App\Models\CompanyChartAccount;

class Index extends CustomComponent
{
    public $listeners = [
        'refreshChartParent' => '$refresh'
    ];

    public function mount()
    {
        $this->placeholder = "Search account title, account type, and code";
        $this->permission  = "chart";
        $this->export      = "chart-accounts-export";
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        return redirect()->route('chart-accounts.create');
    }

    public function render()
    {
        if ( $this->defined_dates && isset($this->dates[$this->defined_dates]) ) {
            $this->from = $this->dates[$this->defined_dates][0] ?? Carbon::now()->format('Y-m-d');
            $this->to   = $this->dates[$this->defined_dates][1] ?? Carbon::now()->format('Y-m-d');
        }

    	$search = $this->search ?? '';
        $limit  = $this->limit ?? 10;
        $from   = $this->from;
        $to     = $this->to;

    	$results = CompanyChartAccount::where('company_id', $this->company_id)
					->where(function (Builder $query) use ($search) {
                        return $query->where('chart_name', 'like', "%" . $this->search ."%")
								->orWhere('code', $search)
                                ->orWhereHas('type', function($query) use ($search) {
                                    return $query->where('name', 'like', "%" . $this->search ."%");
                                });
					});

        if ( !empty($from) ) {
            $results = $results->whereDate('created_at', '>=', $from );
        }

        if ( !empty($to) ) {
            $results = $results->whereDate('created_at', '<=', $to );
        }

        return view('livewire.chart-of-account.index', [
            'results' => $results->with('type')->orderBy('code', 'asc')->paginate($limit)
        ]);
    }
}
