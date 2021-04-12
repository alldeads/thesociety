<?php

namespace App\Http\Livewire\Employee;

use App\Http\Livewire\CustomComponent;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

use App\Models\Employee;

class Index extends CustomComponent
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $company_id;
    public $search = '';
    public $limit;

    public $listeners = [
        'refreshEmployeeParent' => '$refresh'
    ];

    public function mount()
    {
        $this->company_id = auth()->user()->empCard->company_id;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        return redirect()->route('employees-create');
    }

    public function render()
    {
        $search = $this->search;

        $results = Employee::where('company_id', $this->company_id)
            ->where('is_owner', false)
            ->where( function (Builder $query) use ($search) {
                $query->whereHas('user', function($query) use ($search) {
                    return $query->where('email', 'like', "%" . $search ."%")
                        ->orWhereHas('profile', function($query) use ($search) {
                            return $query->where('first_name', 'like', "%" . $search ."%")
                            ->orWhere('middle_name', 'like', "%" . $search ."%")
                            ->orWhere('last_name', 'like', "%" . $search ."%");
                        });
                })->orWhereHas('role', function($query) use ($search) {
                    return $query->where('role_name', 'like', "%" . $search ."%");
                });
            })
            ->orderBy('created_at', 'desc')->paginate($this->limit);
        
        return view('livewire.employee.index', [
            'results' => $results
        ]);
    }
}
