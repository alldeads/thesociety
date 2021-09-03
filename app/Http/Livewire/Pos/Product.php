<?php

namespace App\Http\Livewire\Pos;

use App\Http\Livewire\CustomComponent;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

use App\Models\Product as ProductModel;

class Product extends CustomComponent
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $company_id;
    public $search = '';
    public $limit;
    public $count;

    public $listeners = [
        'refreshPosProductParent' => '$refresh'
    ];

    public function mount()
    {
        $this->count = 0;
        $this->limit = 10;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $search = $this->search;
        $limit = $this->limit ?? 10;

        $results = ProductModel::where('company_id', $this->company_id)
                    ->where('type', 'product')
                    ->where( function (Builder $query) use ($search) {
                        return $query->where('name', 'like', "%". $search . "%");
                    })
                    ->orderBy('id', 'desc')
                    ->paginate($limit);

        $this->count = $results->total();

        return view('livewire.pos.product', [
            'results' => $results
        ]);
    }
}
