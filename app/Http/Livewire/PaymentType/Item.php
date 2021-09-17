<?php

namespace App\Http\Livewire\PaymentType;

use Livewire\Component;

class Item extends Component
{
    public $item;

    public function delete()
    {
        $this->emit('deletePaymentType', ['payment' => $this->item]);
    }

    public function edit()
    {
        return redirect()->route('payment_types-edit', ['payment' => $this->item->id]);
    }
    
    public function render()
    {
        return view('livewire.payment-type.item');
    }
}
