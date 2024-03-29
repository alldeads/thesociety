<?php

namespace App\Http\Livewire\Supplier;

use App\Http\Livewire\CustomComponent;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

use App\Models\Supplier;

class Index extends CustomComponent
{
	use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $company_id;
    public $search = '';
    public $limit;

    public $listeners = [
        'refreshSupplierParent' => '$refresh'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        return redirect()->route('suppliers-create');
    }

    public function render()
    {
    	$search = $this->search;
        $limit  = $this->limit ?? 10;

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
		            })->with(['user.profile', 'status'])->orderBy('id', 'desc')->paginate($limit);
                        
        return view('livewire.supplier.index', [
            'results' => $results
        ]);
    }
}
