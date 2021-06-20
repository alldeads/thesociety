<?php

namespace App\Http\Livewire\CashFlow;

use App\Http\Livewire\CustomComponent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;

use App\Models\ChartType;
use App\Models\User;
use App\Models\CompanyChartAccount;
use App\Models\CashFlow;

class Edit extends CustomComponent
{
	public $company_id;
	public $accounts;
	public $users;
	public $cashflow;
	public $last;

	public $inputs = [];

	public function mount($cashflow)
	{
		$this->accounts = CompanyChartAccount::getCompanyCharts();
		$this->users    = User::getCompanyUsers();
		$this->last     = CashFlow::getCompanyLastEntry();
		$this->cashflow = $cashflow;

		$this->resetBtn();
	}

	public function resetBtn()
	{
		$cashflow = $this->cashflow;

		$amount = $cashflow->credit != 0 ? $cashflow->credit : $cashflow->debit;

		$this->inputs = [
			'posting_date'   => $cashflow->posting_date,
			'account_title'  => $cashflow->account_type_id,
			'account_number' => $cashflow->account_no,
			'balance'        => number_format($cashflow->balance, 2, '.', ','),
			'check_no'       => $cashflow->check_no,
			'movement'       => $cashflow->credit == 0 ? "cr" : "dr",
			'amount'         => $amount,
			'payor'          => $cashflow->payor,
			'old_attachment' => $cashflow->attachment,
			'description'    => $cashflow->description,
			'notes'          => $cashflow->notes
		];

		$this->emit('resetFile', 'attachment');
	}

	public function save()
	{
		Validator::make($this->inputs, [
            'account_title'  => ['required', 'numeric'],
            'account_number' => ['nullable'],
            'check_no'       => ['nullable'],
            'posting_date'   => ['required', 'date'],
            'movement'       => ['required'],
            'amount'         => ['required', 'numeric'],
            'payor'          => ['required', 'numeric'],
            'description'    => ['required'],
            'notes'          => ['nullable'],
            'attachment'     => ['nullable', 'file'],
        ], [
            'payor.required'   => 'Payee or Payor is required.',
        ])->validate();
	}

    public function render()
    {
        return view('livewire.cash-flow.edit');
    }
}
