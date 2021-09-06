<?php

namespace App\Http\Livewire\Branch;

use App\Http\Livewire\CustomComponent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use Carbon\Carbon;

use App\Models\Branch;

class Edit extends CustomComponent
{
    public $inputs = [];
    public $branch;

    public function mount()
    {
        $this->prefill();
    }

    public function prefill()
    {
        $this->inputs = [
            'name'        => $this->branch->name,
            'address'     => $this->branch->address,
            'phone'       => $this->branch->phone,
            'abbr'        => $this->branch->abbr,
            'status'      => $this->branch->status,
            'description' => $this->branch->description,
        ];
    }

    public function read()
    {
        return redirect()->route('branches-read', ['branch' => $this->branch->id]);
    }

    public function resetBtn()
    {
        $this->prefill();
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

        $branch = Branch::find($this->branch->id);

        if ( !$branch ) {
            $this->message('Branch not found!', 'danger');
            return;
        }

        $branch->fill([
            'updated_by'       => auth()->id(),
            'description'      => $this->inputs['description'] ?? null,
            'abbr'             => $this->inputs['abbr'] ?? null,
            'name'             => $this->inputs['name'],
            'phone'            => $this->inputs['phone'] ?? null,
            'address'          => $this->inputs['address'] ?? null,
            'status'           => $this->inputs['status'],
        ]);

        $branch->save();

        $this->message("Branch {$branch->name} has been updated!", 'success');
    }

    public function render()
    {
        return view('livewire.branch.edit');
    }
}
