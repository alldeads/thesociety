<?php

namespace App\Http\Livewire\StockLevel;

use Livewire\Component;
use Carbon\Carbon;

class Read extends Component
{
    public $stock;
    public $inputs;

    public function mount()
    {
        $this->inputs = [
            'reference'  => $this->stock->reference,
            'product'    => $this->stock->product->name ?? 'N/A',
            'branch'     => $this->stock->branch->name ?? 'N/A',
            'reason'     => $this->stock->reason->name ?? 'N/A',
            'before'     => $this->stock->in_stock ?? 0,
            'after'      => $this->stock->after_stock ?? 0,
            'created_at' => Carbon::parse($this->stock->created_at)->format('F j, Y h:i:s a'),
            'created_by' => $this->stock->user_created->profile->name ?? 'N/A',
            'updated_at' => Carbon::parse($this->stock->updated_at)->format('F j, Y h:i:s a'),
            'updated_by' => $this->stock->user_updated->profile->name ?? 'N/A',
        ];
    }

    public function edit()
    {
        return redirect()->route('stock-levels-edit', ['stock' => $this->stock->id]);
    }

    public function render()
    {
        return view('livewire.stock-level.read');
    }
}
