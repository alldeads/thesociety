<?php

namespace App\Http\Livewire\Employee;

use App\Http\Livewire\CustomComponent;

class User extends CustomComponent
{
	public $user;

	public function delete()
	{
		$this->emit('deleteEmployee', ['employee' => $this->user]);
	}

	public function edit()
	{
		return redirect()->route('employees-edit', ['emp' => $this->user->id]);
	}
	
    public function render()
    {
        return view('livewire.employee.user');
    }
}
