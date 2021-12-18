<?php

namespace App\Exports;

use App\Exports\Export;
use App\Models\Covid;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Database\Eloquent\Builder;

class CovidExport extends Export implements FromView
{
    public function view(): View
    {
        $search = $this->search;
        $from = $this->from;
        $to = $this->to;

        $results = Covid::where('company_id', $this->company_id)
                        ->where(function (Builder $query) use ($search) {
                            return $query->where('first_name', 'like', "%". $search ."%")
                                        ->orWhere('phone', 'like', "%". $search ."%")
                                        ->orWhere('address', 'like', "%". $search ."%")
                                        ->orWhere('last_name', 'like', "%". $search ."%");
                        });

        if ( !empty($from) ) {
            $results = $results->whereDate('created_at', '>=', $from );
        }

        if ( !empty($to) ) {
            $results = $results->whereDate('created_at', '<=', $to );
        }

        return view('exports.covid', [
            'covid' => $results->orderBy('id', 'desc')->get()
        ]);
    }
}
