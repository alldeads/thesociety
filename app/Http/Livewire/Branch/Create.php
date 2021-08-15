<?php

namespace App\Http\Livewire\Branch;

use App\Http\Livewire\CustomComponent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use Carbon\Carbon;

use App\Models\Branch;

class Create extends CustomComponent
{
    public $inputs = [];
    public $company_id;

    public function resetBtn()
    {
        $this->inputs = [];
    }

    public function submit()
    {
        Validator::make($this->inputs, [
            'name'           => ['required'],
            'abbr'           => ['nullable'],
            'phone'          => ['nullable'],
            'address'        => ['required'],
            'description'    => ['nullable'],
            'status'         => ['required', Rule::in(['active', 'inactive'])]
        ])->validate();

        Branch::create([
            'company_id'       => $this->company_id,
            'created_by'       => auth()->id(),
            'updated_by'       => auth()->id(),
            'description'      => $this->inputs['description'] ?? null,
            'name'             => $this->inputs['name'],
            'phone'            => $this->inputs['phone'] ?? null,
            'address'          => $this->inputs['address'] ?? null,
            'status'           => $this->inputs['status'],
        ]);

        $this->message('New Branch has been created', 'success');

        $this->inputs = [];
    }

    public function render()
    {
        return view('livewire.branch.create');
    }
}
