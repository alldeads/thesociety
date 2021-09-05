<?php

namespace App\Http\Livewire\History;

use Livewire\Component;

class Item extends Component
{
    public $item;

    public function read()
    {
        return redirect()->route('histories-read', ['history' => $this->item->id]);
    }
    
    public function render()
    {
        return view('livewire.history.item');
    }
}
