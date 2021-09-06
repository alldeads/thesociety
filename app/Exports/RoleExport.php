<?php

namespace App\Exports;

use App\Models\CompanyRole;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

use Illuminate\Database\Eloquent\Builder;

class RoleExport implements FromView
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

        return view('exports.role', [
            'roles' => CompanyRole::where('company_id', $this->company_id)
                        ->where('role_name', 'not like', "%owner%")
                        ->where(function (Builder $query) use ($search) {
                            return $query->where('role_name', 'like', "%". $search ."%");
                        })->orderBy('id', 'desc')->get()
        ]);
    }
}
