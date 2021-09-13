<?php

namespace App\Exports;

use App\Models\Employee;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

use Illuminate\Database\Eloquent\Builder;

class EmployeeExport implements FromView
{
	use Exportable;

	public $search;
	public $company_id;
	public $from;
	public $to;

    public function __construct($search, $company_id, $from, $to)
    {
        $this->search     = $search;
        $this->company_id = $company_id;
        $this->from = $from;
        $this->to = $to;
    }

    public function view(): View
    {
        $search = $this->search;
        $from = $this->from;
        $to = $this->to;

        $results = Employee::where('company_id', $this->company_id)
            ->where('is_owner', false)
            ->where( function (Builder $query) use ($search) {
                $query->whereHas('user', function($query) use ($search) {
                    return $query->where('email', 'like', "%" . $search ."%")
                                ->orWhere('status', $search)
                        ->orWhereHas('profile', function($query) use ($search) {
                            return $query->where('first_name', 'like', "%" . $search ."%")
                            ->orWhere('middle_name', 'like', "%" . $search ."%")
                            ->orWhere('last_name', 'like', "%" . $search ."%");
                        });
                })->orWhereHas('role', function($query) use ($search) {
                    return $query->where('role_name', 'like', "%" . $search ."%");
                });
            });

        if ( !empty($from) ) {
            $results = $results->whereDate('date_hired', '>=', $from );
        }

        if ( !empty($to) ) {
            $results = $results->whereDate('date_hired', '<=', $to );
        }
        
        $results = $results->orderBy('id', 'desc')
                    ->with(['user.profile', 'role'])
                    ->get();

        return view('exports.employee', [
            'employees' => $results
        ]);
    }
}
