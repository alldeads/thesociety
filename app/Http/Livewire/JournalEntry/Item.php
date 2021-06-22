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

	public function read()
	{
		return redirect()->route('journal-entry-read', ['journal' => $this->item->id]);
	}

	public function edit()
	{
		return redirect()->route('journal-entry-edit', ['journal' => $this->item->id]);
	}
	
    public function render()
    {
        return view('livewire.journal-entry.item');
    }
}
