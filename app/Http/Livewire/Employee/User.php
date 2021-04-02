<?php

namespace App\Http\Livewire\Employee;

use Livewire\Component;

class User extends Component
{
	public $user;
	
    public function render()
    {
        return view('livewire.employee.user');
    }
}
