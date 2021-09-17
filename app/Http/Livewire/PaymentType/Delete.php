<?php

namespace App\Http\Livewire\PaymentType;

use App\Http\Livewire\CustomComponent;

use App\Models\PaymentType;

class Delete extends CustomComponent
{
    public $listeners = [
        'deletePaymentType' => 'delete'
    ];

    public $payment;
    public $el = "delete-payment-type-item";

    public function delete($payment)
    {
        $this->payment = $payment;
        $this->emit('showModal', ['el' => $this->el]);
    }

    public function confirm()
    {
        $payment = PaymentType::find($this->payment['payment']['id']);

        if ( !$payment ) {
            $this->message('Oops! Something went wrong upon deletion, please try again!', 'error');
        }

        $payment->updated_by = auth()->id();
        $payment->save();
        $payment->delete();

        $this->emit('dissmissModal', ['el' => $this->el]);
        $this->message('Success! Payment Type has been deleted.', 'success');
        $this->emit('refreshPaymentTypeParent');
    }

    public function render()
    {
        return view('livewire.payment-type.delete');
    }
}
