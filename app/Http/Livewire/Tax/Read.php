<?php

namespace App\Http\Livewire\Tax;

use Livewire\Component;

use App\Models\User;

use Carbon\Carbon;

class Read extends Component
{
    public $inputs = [];
    public $tax;

    public function mount()
    {
        $this->inputs = [
            'name'          => $this->tax->name,
            'percentage'    => $this->tax->percentage,
            'created_by'    => $this->tax->user_created->profile->name ?? "N/A",
            'created_at'    => Carbon::parse($this->tax->created_at)->format('F j, Y h:i:s a'),
            'updated_by'    => $this->tax->user_updated->profile->name ?? "N/A",
            'updated_at'    => Carbon::parse($this->tax->updated_at)->format('F j, Y h:i:s a'),
        ];
    }

    public function create()
    {
        return redirect()->route('tax.create');
    }

    public function edit()
    {
        return redirect()->route('tax.edit', ['tax' => $this->tax->id]);
    }

    public function render()
    {
        return view('livewire.tax.read');
    }
}
