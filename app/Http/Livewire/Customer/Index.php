<?php

namespace App\Http\Livewire\Customer;

use App\Http\Livewire\CustomComponent;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

use App\Models\Customer;

class Index extends CustomComponent
{
	use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $company_id;
    public $search = '';
    public $limit;

    public $listeners = [
        'refreshCustomerParent' => '$refresh'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        return redirect()->route('customers-create');
    }

    public function render()
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
		                });
		            })->orderBy('id', 'desc')->paginate($this->limit);
                        
        return view('livewire.customer.index', [
            'results' => $results
        ]);
    }
}
