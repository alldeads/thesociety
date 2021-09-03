<?php

namespace App\Http\Livewire\Pos;

use Livewire\Component;

class Item extends Component
{
    public $item;

    public function add($id)
    {
        $this->emit('addPosItem', $this->item);
    }

    public function render()
    {
        return view('livewire.pos.item');
    }
}
