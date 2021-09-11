<?php

namespace App\Http\Livewire\Covid;

use App\Http\Livewire\CustomComponent;

use App\Models\Covid;

class Delete extends CustomComponent
{
    public $listeners = [
        'deleteCovidItem' => 'delete'
    ];

    public $item;
    public $el = "delete-covid-item";

    public function delete($item)
    {
        $this->item = $item;
        $this->emit('showModal', ['el' => $this->el]);
    }

    public function confirm()
    {
        $covid = Covid::find($this->item['item']['id']);

        if ( !$covid ) {
            $this->message('Oops! Something went wrong upon deletion, please try again!', 'error');
        }

        $covid->delete();

        $this->emit('dissmissModal', ['el' => $this->el]);
        $this->message('Success! Entry has been deleted.', 'success');
        $this->emit('refreshCovidParent');
    }

    public function render()
    {
        return view('livewire.covid.delete');
    }
}
