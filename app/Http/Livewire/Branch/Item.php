<?php

namespace App\Http\Livewire\Branch;

use Livewire\Component;

class Item extends Component
{
    public $item;

    public $listeners = [
        'refreshBranchItem' => '$refresh'
    ];

    public function delete()
    {
        $this->emit('deleteBranchAccount', ['branch' => $this->item]);
    }

    public function edit()
    {
        return redirect()->route('branches-edit', ['branch' => $this->item->id]);
    }

    public function read()
    {
        return redirect()->route('branches-read', ['branch' => $this->item->id]);
    }

    public function render()
    {
        return view('livewire.branch.item');
    }
}
