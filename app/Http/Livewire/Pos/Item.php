<?php

namespace App\Http\Livewire\Pos;

use Livewire\Component;

class Item extends Component
{
    public $item;

    public function add()
    {
        dd(1);
    }

    public function render()
    {
        return view('livewire.pos.item');
    }
}
