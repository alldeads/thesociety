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

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $this->placeholder = "Search account title, account type, and code";
        $this->permission  = "chart";
        $this->export      = "chart-of-accounts-export";

    	$search = $this->search ?? '';
        $limit  = $this->limit ?? 10;

    	$results = CompanyChartAccount::where('company_id', $this->company_id)
					->where(function (Builder $query) use ($search) {
                        return $query->where('chart_name', 'like', "%" . $this->search ."%")
								->orWhere('code', $search)
                                ->orWhereHas('type', function($query) use ($search) {
                                    return $query->where('name', 'like', "%" . $this->search ."%");
                                });
					})->orderBy('code', 'asc');

        if ( !empty($from) ) {
            $results = $results->whereDate('created_at', '>=', $from );
        }

        if ( !empty($to) ) {
            $results = $results->whereDate('created_at', '<=', $to );
        }

        return view('livewire.chart-of-account.index', [
            'results' => $results->with('type')->paginate($limit)
        ]);
    }
}
