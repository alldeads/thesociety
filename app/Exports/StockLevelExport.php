<?php

namespace App\Exports;

use App\Exports\Export;
use App\Models\StockLevel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use Illuminate\Database\Eloquent\Builder;

class StockLevelExport extends Export implements FromView
{
    public function view(): View
    {
        $search = $this->search;

        $results = StockLevel::where('company_id', $this->company_id)
                    ->where( function (Builder $query) use ($search) {
                        return $query->where('reference', 'like', "%". $search . "%")
                            ->orWhereHas('product', function($query) use ($search) {
                                return $query->where('name', 'like', "%" . $search ."%");
                            })
                            ->orWhereHas('branch', function($query) use ($search) {
                                return $query->where('name', 'like', "%" . $search ."%");
                            });
                    });

        $results = $results->orderBy('id', 'desc')->get();

        return view('exports.stock-level', [
            'stocks' => $results
        ]);
    }
}
