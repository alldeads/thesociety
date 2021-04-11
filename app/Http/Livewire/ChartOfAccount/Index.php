<?php

namespace App\Http\Livewire\ChartOfAccount;

use App\Http\Livewire\CustomComponent;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

use App\Models\CompanyChartAccount;

class Index extends CustomComponent
{
	use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $company_id;
    public $search = '';
    public $limit;

    public $listeners = [
        'refreshChartParent' => '$refresh'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
    	$search = $this->search;

    	$results = CompanyChartAccount::where('company_id', $this->company_id)
    					->where(function (Builder $query) use ($search) {
    						return $query->where('chart_name', 'like', "%" . $search ."%")
    									->orWhere('code', $search);
    					})->orderBy('code', 'asc')->paginate($this->limit);

        return view('livewire.chart-of-account.index', [
            'results' => $results
        ]);
    }
}
