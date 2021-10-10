<?php

namespace App\Http\Livewire\Covid;

use App\Http\Livewire\CustomComponent;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Covid;

use Illuminate\Support\Facades\Validator;

class Index extends CustomComponent
{
    public $listeners = [
        'refreshCovidParent' => '$refresh'
    ];

    public function mount()
    {
        $this->placeholder = "Search first name, last name, phone, or address";
        $this->permission  = "covid";
        $this->export      = "covid-export";
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        return redirect()->route('covid.create');
    }

    public function render()
    {
        $search = $this->search ?? '';
        $from   = $this->from;
        $to     = $this->to;
        $limit  = $this->limit ?? 10;

        $results = Covid::where('company_id', $this->company_id)
                        ->where(function (Builder $query) use ($search) {
                            return $query->where('first_name', 'like', "%". $search ."%")
                                        ->orWhere('phone', 'like', "%". $search ."%")
                                        ->orWhere('address', 'like', "%". $search ."%")
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
