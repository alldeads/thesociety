<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Setting extends Component
{
	public $configData;

	public function switch()
	{

	}

    public function render()
    {
        return view('livewire.user.setting');
    }
}
