<?php

namespace App\Http\Livewire\Panel;

use Livewire\Component;

use App\Models\User;

class Nav extends Component
{
	public $configData;
	public $user;
	public $details;
	public $isDark;

	public function mount()
	{
		$this->details  = User::getUserDetails();
		$this->preference = User::getUserPreference();

		$this->isDark = $this->preference?->is_dark ? true : false;
	}

	public function switch()
	{
		$user = User::find($this->user->id);

		cache()->forget('user-preference');

		$user->preference()->updateOrCreate(
			['user_id' => $user->id],
			['is_dark' => !$this->isDark]
		);

		$this->isDark = !$this->isDark;
	}

    public function render()
    {
        return view('livewire.panel.nav', ['isDark' => $this->isDark]);
    }
}
