<?php

namespace App\Http\Livewire\Panel;

use Livewire\Component;

use App\Models\User;

class Nav extends Component
{
	public $configData;
	public $user;

	public function switch()
	{
		$user = User::find($this->user->id);

		$user->setting()->update([
			'user_id' => $user->id,
			'is_dark' => $this->configData['theme'] === 'dark' ? 0 : 1
		]);

		$this->render();
	}

    public function render()
    {
        return view('livewire.panel.nav');
    }
}