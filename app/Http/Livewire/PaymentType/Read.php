<?php

namespace App\Http\Livewire\PaymentType;

use Carbon\Carbon;

use Livewire\Component;

class Read extends Component
{
    public $inputs = [];
    public $payment;

    public function mount()
    {
        $this->prefill();
    }

    public function prefill()
    {
        $this->inputs = [
            'name'       => $this->payment->name,
            'type'       => $this->payment->type,
            'status'     => $this->payment->status,
            'created_by' => $this->payment->user_created->profile->name ?? '',
            'updated_by' => $this->payment->user_updated->profile->name ?? '',
            'created_at' => Carbon::parse($this->payment->created_at)->format('F j, Y h:i:s a'),
            'updated_at' => Carbon::parse($this->payment->updated_at)->format('F j, Y h:i:s a'),
        ];
    }

    public function edit()
    {
        return redirect()->route('payment_types-edit', ['payment' => $this->payment->id]);
    }

    public function render()
    {
        return view('livewire.payment-type.read');
    }
}
