<?php

namespace App\Http\Livewire\JournalEntry;

use Livewire\Component;

class Item extends Component
{
	public $item;

	public function delete()
	{
		$this->emit('deleteJournalEntryItem', ['item' => $this->item]);
	}
	
    public function render()
    {
        return view('livewire.journal-entry.item');
    }
}
