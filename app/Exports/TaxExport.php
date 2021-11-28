<?php

namespace App\Exports;

use App\Models\Tax;
use App\Exports\Export;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Database\Eloquent\Builder;

class TaxExport extends Export implements FromView
{
    public function view(): View
    {
        $search = $this->search;

        return view('exports.tax', [
            'taxes' => Tax::where('company_id', $this->company_id)
					->where(function (Builder $query) use ($search) {
                        return $query->where('name', 'like', "%" . $search ."%")
                        	->orWhere('percentage', $search);
					})->orderBy('name', 'asc')->get()
        ]);
    }
}
