<?php

namespace App\Exports;

use App\Models\CompanyChartAccount;
use App\Exports\Export;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

use Illuminate\Database\Eloquent\Builder;

class ChartAccountExport extends Export implements FromView
{
    public function __construct($search, $company_id, $from, $to)
    {
        $this->search     = $search;
        $this->company_id = $company_id;
        $this->from       = $from;
        $this->to         = $to;
    }

    public function view(): View
    {
        $search = $this->search;
        $from   = $this->from;
        $to     = $this->to;

        $results = CompanyChartAccount::where('company_id', $this->company_id)
                        ->where(function (Builder $query) use ($search) {
                            return $query->where('chart_name', 'like', "%" . $search ."%")
                                ->orWhere('code', $search)
                                ->orWhereHas('type', function($query) use ($search) {
                                    return $query->where('name', 'like', "%" . $search ."%");
                                });
                        });


        if ( !empty($from) ) {
            $results = $results->whereDate('created_at', '>=', $from );
        }

        if ( !empty($to) ) {
            $results = $results->whereDate('created_at', '<=', $to );
        }

        $results = $results->with(['type', 'user_created'])->orderBy('code', 'asc')->get();

        return view('exports.chart-accounts', [
            'accounts' => $results
        ]);
    }
}
