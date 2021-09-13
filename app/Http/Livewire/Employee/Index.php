<?php

namespace App\Http\Livewire\Employee;

use App\Http\Livewire\CustomComponent;

use Carbon\Carbon;
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
    public $date_from;
    public $date_to;

    public $listeners = [
        'refreshEmployeeParent' => '$refresh'
    ];

    public function mount()
    {
        $this->date_from = Carbon::parse('2000-01-01')->format('Y-m-d');
        $this->date_to   = Carbon::now()->format('Y-m-d');
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
        $from   = $this->date_from;
        $to     = $this->date_to;
        $limit  = $this->limit ?? 10;

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
            });

        if ( !empty($from) ) {
            $results = $results->whereDate('date_hired', '>=', $from );
        }

        if ( !empty($to) ) {
            $results = $results->whereDate('date_hired', '<=', $to );
        }
        
        $results = $results->orderBy('id', 'desc')
                    ->with(['user.profile', 'role'])
                    ->paginate($limit);
        
        return view('livewire.employee.index', [
            'results' => $results
        ]);
    }
}
