<?php

namespace App\Http\Livewire\Sale;

use Livewire\Component;

use App\Models\Product;

class Read extends Component
{
    public $sales;
    public $inputs;

    public function mount()
    {
        $this->inputs['reference']     = $this->sales->reference;
        $this->inputs['customer']      = $this->sales->customer->user->profile->name ?? 'Guest Customer';
        $this->inputs['items']         = $this->sales->items;
        $this->inputs['notes']         = $this->sales->notes ?? "N/A";
        $this->inputs['created_by']    = $this->sales->user_created->profile->name ?? "N/A";
        $this->inputs['subtotal']      = number_format($this->sales->sub_total, 2, '.', ',');
        $this->inputs['total']         = number_format($this->sales->total, 2, '.', ',');
        $this->inputs['discount']      = number_format($this->sales->discount, 2, '.', ',');
        $this->inputs['status']        = ucwords($this->sales->status ?? '');
        $this->inputs['created_at']    = $this->sales->created_at->format('F j, Y h:i:s a');
        $this->inputs['updated_at']    = $this->sales->updated_at->format('F j, Y h:i:s a');
        $this->inputs['updated_by']    = $this->sales->user_updated->profile->name ?? "N/A";
    }

    public function edit()
    {
        return redirect()->route('orders.edit', ['order' => $this->sales->id]);
    }

    public function render()
    {
        return view('livewire.sale.read');
    }
}
