<?php

namespace App\Exports;

use App\Models\Tax;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

use Illuminate\Database\Eloquent\Builder;

class TaxExport implements FromView
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

        return view('exports.tax', [
            'taxes' => Tax::where('company_id', $this->company_id)
					->where(function (Builder $query) use ($search) {
                        return $query->where('name', 'like', "%" . $search ."%")
                        	->orWhere('percentage', $search);
					})->orderBy('name', 'asc')->get()
        ]);
    }
}
