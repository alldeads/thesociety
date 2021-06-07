<?php

namespace App\Exports;

use App\Models\CompanyChartAccount;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

use Illuminate\Database\Eloquent\Builder;

class ChartAccountExport implements FromView
{
	use Exportable;

	public $search;
	public $company_id;

    public function __construct($search, $company_id)
    {
        $this->search     = $search;
        $this->company_id = $company_id;
    }

    public function view(): View
    {
        $search = $this->search;

        return view('exports.chart-accounts', [
            'accounts' => CompanyChartAccount::where('company_id', $this->company_id)
                            ->where(function (Builder $query) use ($search) {
                                return $query->where('chart_name', 'like', "%" . $search ."%")
                                        ->orWhere('code', $search)
                                        ->orWhereHas('type', function($query) use ($search) {
                                            return $query->where('name', 'like', "%" . $search ."%");
                                        });
                            })->orderBy('code', 'asc')->get()
        ]);
    }
}
