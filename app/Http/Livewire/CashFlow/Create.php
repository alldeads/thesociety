<?php

namespace App\Http\Livewire\CashFlow;

use App\Http\Livewire\CustomComponent;
use Illuminate\Support\Facades\Validator;

use App\Models\ChartType;
use App\Models\User;
use App\Models\CompanyChartAccount;

class Create extends CustomComponent
{
	public $company_id;
	public $accounts;
	public $users;

	public $inputs;

	public function mount()
	{
		$this->accounts = CompanyChartAccount::getCompanyCharts($this->company_id);
		$this->users    = User::all();
	}

	public function submit()
	{
		$validator = Validator::make($this->inputs, [
            'account_type'  => ['required', 'numeric'],
            'movement'      => ['required'],
            'amount'        => ['required', 'numeric'],
            'payee'         => ['required', 'numeric'],
            'notes'         => ['nullable', 'string'],
            'attachment'    => ['nullable', 'file'],
        ]);

        if ($validator->fails()) {
        	$error = $validator->errors();
            foreach ($error->all() as $message) {
			    $this->message($message, 'error');
			    return;
			}
        }
	}

    public function render()
    {
        return view('livewire.cash-flow.create');
    }
}
