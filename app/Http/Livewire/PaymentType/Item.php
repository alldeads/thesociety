<?php

namespace App\Http\Livewire\PaymentType;

use Livewire\Component;

class Item extends Component
{
    public $item;
    
    public function render()
    {
        return view('livewire.payment-type.item');
    }
}
