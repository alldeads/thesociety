<?php

namespace App\Exports;

use App\Models\Customer;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

use Illuminate\Database\Eloquent\Builder;

class CustomerExport implements FromView
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

        $results = Customer::where('company_id', $this->company_id)
    				->where( function (Builder $query) use ($search) {
		                $query->whereHas('user', function($query) use ($search) {
		                    return $query->where('email', 'like', "%" . $search ."%")
		                        ->orWhereHas('profile', function($query) use ($search) {
		                            return $query->where('first_name', 'like', "%" . $search ."%")
		                            ->orWhere('middle_name', 'like', "%" . $search ."%")
		                            ->orWhere('last_name', 'like', "%" . $search ."%")
                                    ->orWhere('phone_number', $search);
		                        });
		                })->orWherehas('status',function($query) use ($search) {
                            return $query->where('name', 'like', "%" . $search ."%");
                        });
		            });

        $results = $results->orderBy('id', 'desc')
                    ->with(['user.profile', 'status'])
                    ->get();

        return view('exports.customer', [
            'customers' => $results
        ]);
    }
}
