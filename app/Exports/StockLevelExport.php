<?php

namespace App\Exports;

use App\Models\StockLevel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

use Illuminate\Database\Eloquent\Builder;

class StockLevelExport implements FromView
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
