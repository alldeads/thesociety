<?php

namespace App\Http\Livewire\History;

use Livewire\Component;

use Carbon\Carbon;

class Read extends Component
{
    public $history;
    public $inputs;

    public function mount()
    {
        $this->inputs = [
            'reference'  => $this->history->reference,
            'product'    => $this->history->product->name ?? 'N/A',
            'branch'     => $this->history->branch->name ?? 'N/A',
            'reason'     => $this->history->reason->name ?? 'N/A',
            'before'     => $this->history->in_stock ?? 0,
            'after'      => $this->history->on_hand ?? 0,
            'difference' => $this->history->difference ?? 0,
            'notes'      => $this->history->notes,
            'created_at' => Carbon::parse($this->history->created_at)->format('F j, Y h:i:s a'),
            'created_by' => $this->history->user_created->profile->name ?? 'N/A',
        ];
    }

    public function render()
    {
        return view('livewire.history.read');
    }
}
