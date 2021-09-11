<?php

namespace App\Http\Livewire\Covid;

use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

use App\Models\Covid;

use Illuminate\Support\Facades\Validator;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $company_id;
    public $search = '';
    public $limit;
    public $date_from;
    public $date_to;

    public $listeners = [
        'refreshCovidParent' => '$refresh'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $search = $this->search ?? '';
        $from   = $this->date_from;
        $to     = $this->date_to;
        $limit  = $this->limit ?? 10;

        $results = Covid::where('company_id', $this->company_id)
                        ->where(function (Builder $query) use ($search) {
                            return $query->where('first_name', 'like', "%". $search ."%")
                                        ->orWhere('phone', 'like', "%". $search ."%")
                                        ->orWhere('city', 'like', "%". $search ."%")
                                        ->orWhere('last_name', 'like', "%". $search ."%");
                        });

        if ( !empty($from) ) {
            $results = $results->whereDate('created_at', '>=', $from );
        }

        if ( !empty($to) ) {
            $results = $results->whereDate('created_at', '<=', $to );
        }

        $results = $results->orderBy('id', 'desc')->paginate($limit);
        
        return view('livewire.covid.index', [
            'results' => $results
        ]);
    }
}
