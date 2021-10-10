<?php

namespace App\Http\Livewire\Covid;

use App\Http\Livewire\CustomComponent;
use Illuminate\Support\Facades\Validator;

use App\Models\Covid;

class Create extends CustomComponent
{
    public $inputs;

    public function mount()
    {
        $this->initialize();
    }

    public function submit()
    {
        $validator = Validator::make($this->inputs, [
            'first_name'   => ['required', 'string', 'max:255'],
            'last_name'    => ['required', 'string', 'max:255'],
            'address'      => ['required', 'string', 'max:255'],
            'date_visited' => ['required', 'string'],
            'phone'        => ['required'],
        ])->validate();

        Covid::create([
            'first_name'    => ucwords($this->inputs['first_name']),
            'last_name'     => ucwords($this->inputs['last_name']),
            'address'       => $this->inputs['address'],
            'phone'         => $this->inputs['phone'],
            'created_by'    => auth()->id(),
            'updated_by'    => auth()->id(),
            'company_id'    => $this->company_id
        ]);

        $this->message('New Record has been created', 'success');

        $this->initialize();
    }

    public function initialize()
    {
        $this->inputs = [
            'first_name'   => '',
            'last_name'    => '',
            'address'      => '',
            'phone'        => '',
            'date_visited' => now()->format('Y-m-d')
        ];
    }

    public function render()
    {
        return view('livewire.covid.create');
    }
}
