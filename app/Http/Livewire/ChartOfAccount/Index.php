<?php

namespace App\Http\Livewire\ChartOfAccount;

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
    	$search    = $this->search ?? '';
        $limit     = $this->limit ?? 10;
        $date_from = $this->date_from ?? null;
        $date_to   = $this->date_to ?? now();

    	$results = CompanyChartAccount::where('company_id', $this->company_id)
					->where(function (Builder $query) use ($search) {
                        return $query->where('chart_name', 'like', "%" . $search ."%")
								->orWhere('code', $search)
                                ->orWhereHas('type', function($query) use ($search) {
                                    return $query->where('name', 'like', "%" . $search ."%");
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
