<?php

namespace App\Http\Livewire\Company;

use Livewire\Component;

use Illuminate\Support\Facades\Validator;

use App\Models\Company;
use App\Traits\ResponseTrait;

class Edit extends Component
{
	use ResponseTrait;

	public $company;
	public $inputs;

	public function mount()
	{
		if ( auth()->user()->empCard ) {
			$this->company = auth()->user()->empCard->company;

			$this->inputs = [
				'name'  => $this->company->name,
				'email' => $this->company->email,
				'phone' => $this->company->phone,
				'fax'   => $this->company->fax,
				'bir'   => $this->company->bir,
				'dti'   => $this->company->dti,
				'sss'   => $this->company->sss,
				'business_permit' => $this->company->business_permit,
			];
		}
	}

	public function save()
	{
		Validator::make($this->inputs, [
            'name'            => ['required', 'string', 'max:255'],
            'email'           => ['required', 'email'],
            'phone'           => ['required'],
            'fax'             => ['nullable'],
            'dti'             => ['nullable'],
            'sss'             => ['nullable'],
            'bir'             => ['nullable'],
            'business_permit' => ['nullable'],
        ])->validate();

        try {

        	$company = Company::find($this->company->id);

			$company->fill($this->inputs);
			$company->save();

			$this->message('Company Information has been changed.', 'success');
        } catch (\Exception $e) {
        	dd($e);
        	$this->message('Oops! Something went wrong, please refresh the page.', 'error');
        }
	}

    public function render()
    {
        return view('livewire.company.edit');
    }
}
