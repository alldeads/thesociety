<?php

namespace App\Http\Livewire\Role;

use App\Http\Livewire\CustomComponent;

use App\Models\CompanyRole;

class Delete extends CustomComponent
{
	public $listeners = [
        'deleteRoleItem' => 'delete'
    ];

    public $item;
    public $el = "delete-role-item";

    public function delete($item)
    {
    	$this->item = $item;
    	$this->emit('showModal', ['el' => $this->el]);
    }

    public function confirm()
    {
    	$cr = CompanyRole::find($this->item['item']['id']);

    	if ( !$cr ) {
    		$this->message('Oops! Something went wrong upon deletion, please try again!', 'error');
    	}

        $cr->updated_by = auth()->id();
        $cr->save();
    	$cr->delete();

    	$this->emit('dissmissModal', ['el' => $this->el]);
    	$this->message('Success! Role has been deleted.', 'success');
    	$this->emit('refreshItemParent');
    }

    public function render()
    {
        return view('livewire.role.delete');
    }
}
