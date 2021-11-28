<?php

namespace App\Exports;

use App\Exports\Export;
use App\Models\PurchaseOrder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Database\Eloquent\Builder;

class PurchaseOrderExport extends Export implements FromView
{
    public function view(): View
    {
        $search = $this->search;
        $from = $this->from;
        $to = $this->to;

        $results = PurchaseOrder::where('company_id', $this->company_id)
                    ->where( function (Builder $query) use ($search) {
                        return $query->where('reference', 'like', "%". $search . "%")
                            ->orWhereHas('status', function($query) use ($search) {
                                return $query->where('name', 'like', "%" . $search ."%");
                            })
                            ->orWhereHas('supplier', function($query) use ($search) {
                                return $query->whereHas('user.profile', function($query) use ($search) {
                                    return $query->where('company', 'like', "%" . $search ."%");
                                });
                            });
                    });
                    
        if ( !empty($from) ) {
            $results = $results->whereDate('created_at', '>=', $from );
        }

        if ( !empty($to) ) {
            $results = $results->whereDate('created_at', '<=', $to );
        }            

        $results  =  $results->with(['supplier.user.profile', 'status', 'user_approved.profile'])
                            ->orderBy('id', 'desc')
                            ->get();

        return view('exports.purchase-order', [
            'purchase_orders' => $results
        ]);
    }
}
