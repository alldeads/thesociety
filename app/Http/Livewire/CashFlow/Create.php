<?php

namespace App\Http\Livewire\CashFlow;

use App\Http\Livewire\CustomComponent;
use Illuminate\Support\Facades\Validator;

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
		$this->accounts = CompanyChartAccount::getCompanyCharts($this->company_id);
		$this->users    = User::getCompanyUsers($this->company_id);
	}

	public function submit()
	{
		$validator = Validator::make($this->inputs, [
            'account_title' => ['required', 'numeric'],
            'movement'      => ['required'],
            'amount'        => ['required', 'numeric'],
            'payor'         => ['required', 'numeric'],
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

        $attachment = "";

        if ( isset($this->inputs['attachment']) ) {
        	$attachment = $this->inputs['attachment']->store('attachments');
        }

        $cashflow = CashFlow::getCompanyLastEntry($this->company_id);
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
        	'payor'            => $this->inputs['payor'],
        	'notes'            => $this->inputs['notes'] ?? null,
        	'attachment'       => $attachment ?? null,
        	'credit'           => $data['credit'] ?? 0,
        	'debit'            => $data['debit'] ?? 0,
        	'balance'          => $data['balance']
        ]);

        $this->emit('refreshCashFlowParent');

        $this->message('New Entry has been created', 'success');

        $this->inputs = [];

        $this->emit('dissmissModal', ['el' => 'modal-cash-flow-create']);
	}

    public function render()
    {
        return view('livewire.cash-flow.create');
    }
}