<?php

namespace App\Http\Livewire\Employee;

use Livewire\Component;

use App\Models\Employee;

class Index extends Component
{
    public function render()
    {
        return view('livewire.employee.index');
    }
}
