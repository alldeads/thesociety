<?php

namespace App\Http\Livewire\PaymentType;

use App\Http\Livewire\CustomComponent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use Carbon\Carbon;

use App\Models\PaymentType;

class Create extends CustomComponent
{
    public $inputs = [];
    public $company_id;

    public function submit()
    {
        Validator::make($this->inputs, [
            'name' => ['required'],
            'type' => ['required', Rule::in(['card', 'check', 'other'])]
        ])->validate();

        PaymentType::create([
            'company_id'  => $this->company_id,
            'name'        => $this->inputs['name'],
            'type'        => $this->inputs['type'],
            'status'      => 'active'
        ]);

        $this->message('Payment Type has been created', 'success');

        $this->inputs = [];
    }

    public function render()
    {
        return view('livewire.payment-type.create');
    }
}
