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
				'name'            => $this->company->name,
				'email'           => $this->company->email,
				'phone'           => $this->company->phone,
				'fax'             => $this->company->fax,
				'bir'             => $this->company->bir,
				'dti'             => $this->company->dti,
				'sss'             => $this->company->sss,
				'business_permit' => $this->company->business_permit,
				'state'           => $this->company->state,
				'street'          => $this->company->street,
				'address_line_2'  => $this->company->address_line_2,
				'city'            => $this->company->city,
				'postal'          => $this->company->postal,
				'facebook'        => $this->company->facebook,
				'twitter'         => $this->company->twitter,
				'instagram'       => $this->company->instagram,
				'linkedin'        => $this->company->linkedin,
				'pinterest'       => $this->company->pinterest,
				'youtube'         => $this->company->youtube,
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
            'state'           => ['nullable'],
            'street'          => ['nullable'],
            'address_line_2'  => ['nullable'],
            'city'            => ['nullable'],
            'postal'          => ['nullable'],
            'facebook'        => ['nullable', 'url'],
            'twitter'         => ['nullable', 'url'],
            'instagram'       => ['nullable', 'url'],
            'linkedin'        => ['nullable', 'url'],
            'youtube'         => ['nullable', 'url'],
            'pinterest'       => ['nullable', 'url'],
            'business_permit' => ['nullable'],
        ])->validate();

        try {

        	$company = Company::find($this->company->id);

        	dd($this->inputs);
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
