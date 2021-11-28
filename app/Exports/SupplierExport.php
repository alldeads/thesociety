<?php

namespace App\Exports;

use App\Exports\Export;
use App\Models\Supplier;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use Illuminate\Database\Eloquent\Builder;

class SupplierExport extends Export implements FromView
{
    public function view(): View
    {
        $search = $this->search;

        $results = Supplier::where('company_id', $this->company_id)
    				->where( function (Builder $query) use ($search) {
		                $query->whereHas('user', function($query) use ($search) {
		                    return $query->where('email', 'like', "%" . $search ."%")
		                        ->orWhereHas('profile', function($query) use ($search) {
		                            return $query->where('first_name', 'like', "%" . $search ."%")
                                    ->orWhere('company', 'like', "%" . $search ."%")
		                            ->orWhere('middle_name', 'like', "%" . $search ."%")
		                            ->orWhere('last_name', 'like', "%" . $search ."%")
                                    ->orWhere('phone_number', 'like', "%" . $search ."%");
		                        });
		                })->orWherehas('status',function($query) use ($search) {
                            return $query->where('name', 'like', "%" . $search ."%");
                        });
		            })->with(['user.profile', 'status'])->orderBy('id', 'desc')->get();

        return view('exports.supplier', [
            'suppliers' => $results
        ]);
    }
}
