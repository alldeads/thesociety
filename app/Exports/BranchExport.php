<?php

namespace App\Exports;

use App\Exports\Export;
use App\Models\Branch;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use Illuminate\Database\Eloquent\Builder;

class BranchExport extends Export implements FromView
{
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

        return view('exports.branch', [
            'branches' => $results->orderBy('id', 'desc')->get()
        ]);
    }
}
