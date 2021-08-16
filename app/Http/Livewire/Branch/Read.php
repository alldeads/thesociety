<?php

namespace App\Http\Livewire\Branch;

use Livewire\Component;

use Carbon\Carbon;

class Read extends Component
{
    public $inputs = [];
    public $branch;

    public function mount()
    {
        $this->inputs = [
            'name'        => $this->branch->name,
            'address'     => $this->branch->address,
            'phone'       => $this->branch->phone,
            'abbr'        => $this->branch->abbr,
            'status'      => ucwords($this->branch->status),
            'description' => $this->branch->description,
            'created_by'  => $this->branch->user_created->profile->name ?? "N/A",
            'created_at'  => Carbon::parse($this->branch->created_at)->format('F j, Y h:i a'),
            'updated_by'  => $this->branch->user_updated->profile->name ?? "N/A",
            'updated_at'  => Carbon::parse($this->branch->updated_at)->format('F j, Y h:i a'),
        ];
    }

    public function render()
    {
        return view('livewire.branch.read');
    }
}
