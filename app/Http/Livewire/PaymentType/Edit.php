<?php

namespace App\Http\Livewire\PaymentType;

use App\Http\Livewire\CustomComponent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use Carbon\Carbon;

use App\Models\PaymentType;

class Edit extends CustomComponent
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
            'name'    => $this->payment->name,
            'type'    => $this->payment->type,
            'status'  => $this->payment->status,
        ];
    }

    public function read()
    {
        return redirect()->route('payment_types-read', ['payment' => $this->payment->id]);
    }

    public function resetBtn()
    {
        $this->prefill();
    }

    public function submit()
    {
        Validator::make($this->inputs, [
            'name'   => ['required'],
            'type'   => ['required', Rule::in(['card', 'check', 'other'])],
            'status' => ['required', Rule::in(['active', 'inactive'])]
        ])->validate();

        $payment = PaymentType::find($this->payment->id);
        
        if ( !$payment ) {
            $this->message('Payment Type not found!', 'danger');
            return;
        }

        $payment->fill([
            'updated_by'  => auth()->id(),
            'name'        => $this->inputs['name'],
            'type'        => $this->inputs['type'],
            'status'      => $this->inputs['status'],
        ]);

        $payment->save();

        $this->message("Payment type {$payment->name} has been updated!", 'success');
    }

    public function render()
    {
        return view('livewire.payment-type.edit');
    }
}
