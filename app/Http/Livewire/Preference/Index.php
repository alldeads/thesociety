<?php

namespace App\Http\Livewire\Preference;

use App\Http\Livewire\CustomComponent;
use Illuminate\Support\Facades\Validator;

use App\Models\Preference;
use App\Models\ChartAccount;

class Index extends CustomComponent
{
    public $accounts;
    public $company_id;
    public $inputs;
    public $preference;

    public function mount()
    {
        $this->accounts = ChartAccount::getCompanyCharts();

        $this->preference = Preference::where('company_id', $this->company_id)->first();

        $this->resetBtn();
    }

    public function resetBtn()
	{
		$this->inputs = [
            'account_payable'     => $this->preference->account_payable ?? null,
            'account_receivable'  => $this->preference->account_receivable ?? null,
            'company'             => $this->company_id
        ];
	}

    public function submit()
    {
        Validator::make($this->inputs ?? [], [
            'account_payable'    => ['nullable', 'exists:company_chart_accounts,id'],
            'account_receivable' => ['nullable', 'exists:company_chart_accounts,id'],
        ])->validate();

        try {
            $this->preference = Preference::updateOrCreate([
                'company_id' => $this->company_id
            ],[
                'account_payable'    => $this->inputs['account_payable'] ?? null,
                'account_receivable' => $this->inputs['account_receivable'] ?? null,
            ]);
    
            $this->message('Preferences has been updated.', 'success');

            $this->resetBtn();
        } catch (\Exception $e) {

            $this->message('Oops! There was an error, please try again', 'error');
        }
    }

    public function render()
    {
        return view('livewire.preference.index');
    }
}
