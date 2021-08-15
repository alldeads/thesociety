<?php

namespace App\Http\Livewire\Branch;

use App\Http\Livewire\CustomComponent;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

use App\Models\Branch;

class Index extends CustomComponent
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $company_id;
    public $search = '';
    public $limit;

    public $listeners = [
        'refreshBranchParent' => '$refresh'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        return redirect()->route('branches-create');
    }

    public function render()
    {
        $search = $this->search;
        $limit  = $this->limit ?? 10;

        $results = Branch::where('company_id', $this->company_id)
                    ->where( function (Builder $query) use ($search) {
                        $query->where('name', 'like', "%" . $search ."%")
                            ->orWhere('phone', 'like', "%" . $search ."%")
                            ->orWhere('description','like', "%" . $search ."%")
                            ->orWhere('address','like', "%" . $search ."%");
                    });

        $results = $results->orderBy('id', 'desc')
                    ->paginate($limit);
                        
        return view('livewire.branch.index', [
            'results' => $results
        ]);
    }
}
