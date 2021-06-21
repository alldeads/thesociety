<?php

namespace App\Http\Livewire\JournalEntry;

use App\Http\Livewire\CustomComponent;

use App\Models\JournalEntry;

class Delete extends CustomComponent
{
	public $listeners = [
        'deleteJournalEntryItem' => 'delete'
    ];

    public $item;
    public $el = "delete-journal-entry-item";

    public function delete($item)
    {
    	$this->item = $item;
    	$this->emit('showModal', ['el' => $this->el]);
    }

    public function confirm()
    {
    	$je = JournalEntry::find($this->item['item']['id']);

    	if ( !$je ) {
    		$this->message('Oops! Something went wrong upon deletion, please try again!', 'error');
    	}

        $je->updated_by = auth()->id();
        $je->save();
    	$je->delete();

    	$this->emit('dissmissModal', ['el' => $this->el]);
    	$this->message('Success! Journal Entry has been deleted.', 'success');
    	$this->emit('refreshJournalEntryParent');
    }

    public function render()
    {
        return view('livewire.journal-entry.delete');
    }
}
