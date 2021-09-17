<?php

namespace App\Http\Livewire\PaymentType;

use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

use App\Models\PaymentType;

use Illuminate\Support\Facades\Validator;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $company_id;
    public $search = '';
    public $limit;

    public $listeners = [
        'refreshPaymentTypeParent' => '$refresh'
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        return redirect()->route('payment_types-create');
    }

    public function render()
    {
        $search = $this->search ?? '';
        $limit  = $this->limit ?? 10;

        $results = PaymentType::where('company_id', $this->company_id)
                        ->where(function (Builder $query) use ($search) {
                            return $query->where('name', 'like', "%". $search ."%")
                                        ->orWhere('type', $search)
                                        ->orWhere('status', $search);
                        })->orderBy('id', 'desc')
                        ->paginate($limit);
        
        return view('livewire.payment-type.index', [
            'results' => $results
        ]);
    }
}
