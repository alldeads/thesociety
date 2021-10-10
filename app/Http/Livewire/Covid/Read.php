<?php

namespace App\Http\Livewire\Covid;

use Livewire\Component;

use Carbon\Carbon;

class Read extends Component
{
    public $covid;
    public $inputs;

    public function mount()
    {
        $this->inputs = [
            'first_name'    => $this->covid->first_name ?? "N/A",
            'last_name'     => $this->covid->last_name ?? "N/A",
            'phone'         => $this->covid->phone ?? "N/A",
            'address'       => $this->covid->address ?? "N/A",
            'date_visited'  => Carbon::parse($this->covid->date_visited)->format('F j, Y'),
            'created_by'    => $this->covid->user_created->profile->name ?? "N/A",
            'created_at'    => Carbon::parse($this->covid->created_at)->format('F j, Y h:i:s a'),
            'updated_by'    => $this->covid->user_updated->profile->name ?? "N/A",
            'updated_at'    => Carbon::parse($this->covid->updated_at)->format('F j, Y h:i:s a'),
        ];
    }

    public function create()
    {
        return redirect()->route('covid.create');
    }

    public function edit()
    {
        return redirect()->route('covid.edit', [$this->covid->id]);
    }

    public function render()
    {
        return view('livewire.covid.read');
    }
}
