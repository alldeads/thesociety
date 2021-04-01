<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;
use App\Models\CompanyRole;
use App\Traits\ResponseTrait;

class Delete extends Component
{
	use ResponseTrait;

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
