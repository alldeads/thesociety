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

class Create extends CustomComponent
{
	public $company_id;
	public $accounts;
	public $users;

	public $inputs = [];

	public function mount()
	{
		$this->accounts = CompanyChartAccount::getCompanyCharts();
		$this->users    = User::getCompanyUsers();

        $this->inputs['posting_date'] = Carbon::now()->format('Y-m-d');
	}

    public function resetBtn()
    {
        $this->inputs = [];
        $this->inputs['posting_date'] = Carbon::now()->format('Y-m-d');
        $this->emit('resetFile', 'attachment');
    }

	public function submit()
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

        $attachment = null;

        if ( isset($this->inputs['attachment']) ) {
            $attachment = Storage::url($this->inputs['attachment']->store('attachments'));
        }

        $cashflow = CashFlow::getCompanyLastEntry();
        $balance  = 0;

        if ( $cashflow ) {
        	$balance = $cashflow->balance;
        }

        $data = [];

        if ( $this->inputs['movement'] == "cr" ) {
        	$data['credit']  = $this->inputs['amount'];
        	$data['balance'] = $balance - $this->inputs['amount'];
        } else {
        	$data['debit']   = $this->inputs['amount'];
        	$data['balance'] = $balance + $this->inputs['amount'];
        }

        CashFlow::create([
        	'company_id'       => $this->company_id,
        	'created_by'       => auth()->id(),
        	'updated_by'       => auth()->id(),
        	'account_type_id'  => $this->inputs['account_title'],
            'account_no'       => $this->inputs['account_number'] ?? null,
            'check_no'         => $this->inputs['check_no'] ?? null,
            'posting_date'     => $this->inputs['posting_date'],
            'description'      => $this->inputs['description'] ?? null,
        	'payor'            => $this->inputs['payor'],
        	'notes'            => $this->inputs['notes'] ?? null,
        	'attachment'       => $attachment ?? null,
        	'credit'           => $data['credit'] ?? 0,
        	'debit'            => $data['debit'] ?? 0,
        	'balance'          => $data['balance']
        ]);

        cache()->forget('app-cash-flow-last');

        $this->emit('refreshCashFlowParent');

        $this->emit('resetFile', 'attachment');

        $this->message('New Entry has been created', 'success');

        $this->inputs = [];

        $this->emit('refreshCashFlowItem');
	}

    public function render()
    {
        return view('livewire.cash-flow.create');
    }
}
