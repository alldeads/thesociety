<?php

namespace App\Exports;

use App\Models\CompanyRole;
use App\Exports\Export;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use Illuminate\Database\Eloquent\Builder;

class RoleExport extends Export implements FromView
{
    public function view(): View
    {
        $search = $this->search;

        return view('exports.role', [
            'roles' => CompanyRole::where('company_id', $this->company_id)
                        ->where('role_name', 'not like', "%owner%")
                        ->where(function (Builder $query) use ($search) {
                            return $query->where('role_name', 'like', "%". $search ."%");
                        })->orderBy('id', 'desc')->get()
        ]);
    }
}
