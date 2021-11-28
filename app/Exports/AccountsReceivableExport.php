<?php

namespace App\Exports;

use App\Models\AccountsReceivable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Exports\Export;

use Illuminate\Database\Eloquent\Builder;

class AccountsReceivableExport extends Export implements FromView
{
    public function view(): View
    {
        $search = $this->search;
        $from = $this->from;
        $to = $this->to;

        $results = AccountsReceivable::where('company_id', $this->company_id)
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
            $results = $results->whereDate('posting_date', '>=', $from );
        }

        if ( !empty($to) ) {
            $results = $results->whereDate('posting_date', '<=', $to );
        }

        $results = $results->orderBy('id', 'desc')->get();

        return view('exports.accounts-receivable', [
            'receivables' => $results
        ]);
    }
}
