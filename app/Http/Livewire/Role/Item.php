<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;

class Item extends Component
{
	public $item;

	public $listeners = [
        'refreshItem' => '$refresh'
    ];

	public function delete()
	{
		$this->emit('deleteRoleItem', ['item' => $this->item]);
	}

	public function edit()
	{
		$this->emit('updateRoleItem', ['item' => $this->item]);
	}

	public function read()
	{
		$this->emit('readRoleItem', ['item' => $this->item]);
	}

    public function render()
    {
        return view('livewire.role.item');
    }
}
