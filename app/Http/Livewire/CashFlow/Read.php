<?php

namespace App\Http\Livewire\CashFlow;

use Livewire\Component;

use Carbon\Carbon;

class Read extends Component
{
	public $inputs = [];
	public $cashflow;

	public function mount($cashflow)
	{
		$amount = $cashflow->credit != 0 ? $cashflow->credit : $cashflow->debit;

		$this->inputs = [
			'posting_date'   => Carbon::parse($cashflow->posting_date)->format('F j, Y'),
			'account_title'  => $cashflow->chart_account->chart_name,
			'account_number' => $cashflow->account_no ?? "N/A",
			'check_no'       => $cashflow->check_no ?? "N/A",
			'movement'       => $cashflow->credit == 0 ? "Credit" : "Debit",
			'balance'        => number_format($cashflow->balance, 2, '.', ','),
			'amount'         => number_format($amount, 2, '.', ','),
			'payee'          => $cashflow->user->profile->name,
			'attachment'     => $cashflow->attachment ?? "No attachment.",
			'description'    => $cashflow->description,
			'notes'          => $cashflow->notes ?? "N/A",
			'created_by'     => $cashflow->user_created->profile->name ?? "N/A",
			'created_at'     => Carbon::parse($cashflow->created_at)->format('F j, Y h:i a'),
			'updated_by'     => $cashflow->user_updated->profile->name ?? "N/A",
			'updated_at'     => Carbon::parse($cashflow->updated_at)->format('F j, Y h:i a'),
		];
	}

	public function create()
	{
		return redirect()->route('cash-flow-create');
	}

    public function render()
    {
        return view('livewire.cash-flow.read');
    }
}
