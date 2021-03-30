<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\CompanyRole;

class Edit extends Component
{
	use ResponseTrait;

	public $listeners = [
        'updateRoleItem' => 'edit'
    ];

    public $item;
    public $el = "modal-role-edit";
    public $inputs = [
    	'name'
    ];

    public function edit($item)
    {
    	$this->item = $item;
    	$this->inputs['name'] = $this->item['item']['role_name'];
    	$this->emit('showModal', ['el' => $this->el]);
    }

    public function submit()
    {
    	Validator::make($this->inputs, [
            'name'  => ['required', 'string', 'max:255'],
        ])->validate();

		try {
			DB::beginTransaction();

			$cr = CompanyRole::find($this->item['item']['id']);

			if ( !$cr ) {
				$this->message('Oops! Something went wrong, please refresh the page.', 'error');
			}

			$cr->fill([
				'role_name'  => strtolower($this->inputs['name']),
	        	'updated_by' => auth()->id()
			]);

			$cr->save();

	        DB::commit();

	        $this->emit('dissmissModal', ['el' => $this->el]);

	        $this->message('Role has been updated.', 'success');

	        $this->emit('refreshItem');
		} catch (\Exception $e) {
			DB::rollback();
			$this->message('Oops! Something went wrong, please refresh the page.', 'error');
		}
    }

    public function render()
    {
        return view('livewire.role.edit');
    }
}
