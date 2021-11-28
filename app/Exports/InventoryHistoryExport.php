<?php

namespace App\Exports;

use App\Exports\Export;
use App\Models\InventoryHistory;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Database\Eloquent\Builder;

class InventoryHistoryExport extends Export implements FromView
{
    public function view(): View
    {
        $search = $this->search;
        $from = $this->from;
        $to = $this->to;

        $results = InventoryHistory::where('company_id', $this->company_id)
                    ->where( function (Builder $query) use ($search) {
                        return $query->where('reference', 'like', "%". $search . "%")
                            ->orWhereHas('product', function($query) use ($search) {
                                return $query->where('name', 'like', "%" . $search ."%");
                            })
                            ->orWhereHas('branch', function($query) use ($search) {
                                return $query->where('name', 'like', "%" . $search ."%");
                            })
                            ->orWhereHas('reason', function($query) use ($search) {
                                return $query->where('name', 'like', "%" . $search ."%");
                            });
                    });

        if ( !empty($from) ) {
            $results = $results->whereDate('created_at', '>=', $from );
        }

        if ( !empty($to) ) {
            $results = $results->whereDate('created_at', '<=', $to );
        }

        $results = $results->orderBy('id', 'desc')->get();

        return view('exports.inventory-history', [
            'histories' => $results
        ]);
    }
}
