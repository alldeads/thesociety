<?php

namespace App\Http\Livewire\Panel;

use Livewire\Component;

use App\Models\User;

class Nav extends Component
{
	public $configData;
	public $user;
	public $details;

	public function mount()
	{
		$this->details = User::getUserDetails();
	}

	public function switch()
	{
		$user = User::find($this->user->id);

		cache()->forget('user-setting');

		$user->setting()->updateOrCreate([
			'user_id' => $user->id,
		],[
			'is_dark' => $this->configData['theme'] === 'dark' ? 0 : 1
		]);

		$this->emit('$refresh');
	}

    public function render()
    {
        return view('livewire.panel.nav');
    }
}
