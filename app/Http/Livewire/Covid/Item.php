<?php

namespace App\Http\Livewire\Covid;

use Livewire\Component;

class Item extends Component
{
    public $item;

    public function delete()
    {
        $this->emit('deleteCovidItem', ['item' => $this->item]);
    }

    public function read()
    {
        return redirect()->route('covid.show', [$this->item->id]);
    }

    public function render()
    {
        return view('livewire.covid.item');
    }
}
