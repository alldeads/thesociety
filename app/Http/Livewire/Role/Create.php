<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\CompanyRole;
use App\Traits\ResponseTrait;

class Create extends Component
{
	use ResponseTrait;

	public $inputs = [
		'name'
	];
	public $company_id;

	public function mount($company_id)
	{
		$this->company_id = $company_id;
	}

	public function submit()
	{
		Validator::make($this->inputs, [
            'name'  => ['required', 'string', 'max:255'],
        ])->validate();

		try {
			DB::beginTransaction();

	        CompanyRole::create([
	        	'company_id' => $this->company_id,
	        	'role_name'  => strtolower($this->inputs['name']),
	        	'created_by' => auth()->id()
	        ]);

	        DB::commit();

	        $this->emit('refreshItem');

	        $this->message('New Role has been created', 'success');

	        $this->inputs['name'] = '';

	        $this->emit('dissmissModal', ['el' => 'modal-role-create']);
		} catch (\Exception $e) {
			DB::rollback();
			$this->message('Oops! Something went wrong, please refresh the page.', 'error');
		}
	}

    public function render()
    {
        return view('livewire.role.create');
    }
}
