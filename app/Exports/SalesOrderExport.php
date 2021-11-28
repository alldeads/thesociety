<?php

namespace App\Exports;

use App\Exports\Export;
use App\Models\SalesOrder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use Illuminate\Database\Eloquent\Builder;

class SalesOrderExport extends Export implements FromView
{
    public function view(): View
    {
        $search = $this->search;
        $from = $this->from;
        $to = $this->to;

        $results = SalesOrder::where('company_id', $this->company_id)
                        ->where( function (Builder $query) use ($search) {
                        return $query->where('reference', 'like', "%". $search . "%")
                            ->orWhere('type', 'like', "%". $search . "%")
                            ->orWhereHas('customer', function($query) use ($search) {
                            return $query->whereHas('user', function($query) use ($search) {
                                return $query->whereHas('profile', function($query) use ($search) {
                                    return $query->where('first_name', 'like', "%" . $search ."%")
                                                ->orWhere('middle_name', 'like', "%" . $search ."%")
                                                ->orWhere('last_name', 'like', "%" . $search ."%")
                                                ->orWhere('phone_number', $search);
                                    });
                                });
                            });
                        });
                    
        if ( !empty($from) ) {
            $results = $results->whereDate('created_at', '>=', $from );
        }

        if ( !empty($to) ) {
            $results = $results->whereDate('created_at', '<=', $to );
        }            

        $results  =  $results->with(['customer.user.profile'])
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('exports.sales-order', [
            'sales' => $results
        ]);
    }
}
