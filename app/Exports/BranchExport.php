<?php

namespace App\Exports;

use App\Models\Branch;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

use Illuminate\Database\Eloquent\Builder;

class BranchExport implements FromView
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

        $results = Branch::where('company_id', $this->company_id)
                    ->where( function (Builder $query) use ($search) {
                        $query->where('name', 'like', "%" . $search ."%")
                            ->orWhere('phone', 'like', "%" . $search ."%")
                            ->orWhere('description','like', "%" . $search ."%")
                            ->orWhere('address','like', "%" . $search ."%");
                    });

        $results = $results->orderBy('id', 'desc')->get();

        return view('exports.branch', [
            'branches' => $results
        ]);
    }
}
