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
        $this->baseView    = "chart-of-account";
        
        $this->columns        = $this->getFilters();
        $this->columnCount    = $this->getColumns();
        $this->hasPermissions = $this->isUserHasPermissions();
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

        $filters = $this->filters;
        $limit   = $this->limit ?? 10;
        $from    = $this->from;
        $to      = $this->to;

    	$results = CompanyChartAccount::where('company_id', $this->company_id)
					->where(function (Builder $query) use ($filters) {

                        if ( isset($filters['title']) && !empty($filters['title']) ) {
                            $query->where('chart_name', 'like', "%" . $filters['title'] ."%");
                        }

                        if ( isset($filters['code']) && !empty($filters['code']) ) {
                            $query->where('code', $filters['code']);
                        }

                        if ( isset($filters['type']) && !empty($filters['type']) ) {
                            $query->whereHas('type', function($query) use ($filters) {
                                return $query->where('name', 'like', "%" . $filters['type'] ."%");
                            });
                        }

                        return $query;
					});

        $results->whereDate('created_at', '>=', $from )
                ->whereDate('created_at', '<=', $to );

        return view('livewire.chart-of-account.index', [
            'results' => $results->with('type')->orderBy('code', 'asc')->paginate($limit)
        ]);
    }

    public function getFilters()
    {
        return [
            [
                'label'  => 'code',
                'type'   => 'number'
            ],
            [
                'label'  => 'title',
                'type'   => 'text'
            ],
            [
                'label'  => 'type',
                'type'   => 'select',
                'values' => [
                    'Assets', 'Liabilities', 'Income', 'Equity', 'Expenses'
                ]
            ]
        ];
    }
}
