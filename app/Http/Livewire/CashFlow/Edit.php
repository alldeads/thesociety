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
			'movement'       => $cashflow->credit != 0 ? "cr" : "dr",
			'amount'         => $amount,
			'payor'          => $cashflow->payor,
			'old_attachment' => $cashflow->attachment,
			'description'    => $cashflow->description,
			'notes'          => $cashflow->notes
		];

		$this->emit('resetFile', 'attachment');
	}

	public function read()
	{
		return redirect()->route('cash-flow-read', ['cashflow' => $this->cashflow->id]);
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

        $cf = CashFlow::find($this->cashflow->id);

        $balance = $cf->balance; // current balance
        $data    = [];
        $updated = [];

        if ( $cf->id == $this->last->id ) { // Last entry
        	if ( $cf->credit == 0 ) {
        		$balance -= $cf->debit;
        	} else {
        		$balance += $cf->credit;
        	}

        	if ( $this->inputs['movement'] == "cr" ) {
	        	$data['credit']  = $this->inputs['amount'];
	        	$data['balance'] = $balance - $this->inputs['amount'];
	        } else {
	        	$data['debit']   = $this->inputs['amount'];
	        	$data['balance'] = $balance + $this->inputs['amount'];
	        }

	        $cf->fill([
	        	'credit'   => $data['credit'] ?? 0,
	        	'debit'    => $data['debit'] ?? 0,
	        	'balance'  => $data['balance']
	        ]);
        }

        $attachment = $cf->attachment;

        if ( isset($this->inputs['attachment']) ) {
            $attachment = Storage::url($this->inputs['attachment']->store('attachments'));
        } 

        $cf->fill([
        	'updated_by'       => auth()->id(),
        	'account_type_id'  => $this->inputs['account_title'],
            'account_no'       => $this->inputs['account_number'] ?? null,
            'check_no'         => $this->inputs['check_no'] ?? null,
            'posting_date'     => $this->inputs['posting_date'],
            'description'      => $this->inputs['description'] ?? null,
        	'payor'            => $this->inputs['payor'],
        	'notes'            => $this->inputs['notes'] ?? null,
        	'attachment'       => $attachment
        ]);

        $cf->save();

        $this->inputs['balance'] = number_format($data['balance'] ?? $balance, 2, '.', ',');
        $this->inputs['old_attachment'] = $attachment;

        cache()->forget('app-cash-flow-last');

        $this->message('Entry has been updated.', 'success');
	}

    public function render()
    {
        return view('livewire.cash-flow.edit');
    }
}
