<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;

class Item extends Component
{
	public $item;

	public function mount($item)
	{
		$this->item = $item;
	}

	public function delete()
	{
		$this->emit('deleteRoleItem', ['item' => $this->item]);
	}

    public function render()
    {
        return view('livewire.role.item');
    }
}
