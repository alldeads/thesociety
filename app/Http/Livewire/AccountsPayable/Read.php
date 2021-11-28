<?php

namespace App\Http\Livewire\AccountsPayable;

use Livewire\Component;
use Carbon\Carbon;

class Read extends Component
{
    public $inputs = [];
	public $payable;

    public function mount()
    {
        $payable = $this->payable;

		$this->inputs = [
			'posting_date'   => Carbon::parse($payable->posting_date)->format('F j, Y'),
			'account_title'  => $payable->chart_account->chart_name,
			'account_number' => $payable->account_no ?? "N/A",
			'check_no'       => $payable->check_no ?? "N/A",
			'amount'         => number_format($payable->amount, 2, '.', ','),
			'payee'          => $payable->user->profile->name,
			'attachment'     => $payable->attachment ?? "No attachment.",
			'description'    => $payable->description,
			'notes'          => $payable->notes ?? "N/A",
            'status'         => $payable->status ?? "N/A",
			'created_by'     => $payable->user_created->profile->name ?? "N/A",
			'created_at'     => Carbon::parse($payable->created_at)->format('F j, Y h:i a'),
			'updated_by'     => $payable->user_updated->profile->name ?? "N/A",
			'updated_at'     => Carbon::parse($payable->updated_at)->format('F j, Y h:i a'),
		];
    }

    public function create()
	{
		return redirect()->route('accounts-payable.create');
	}

	public function edit()
	{
		return redirect()->route('accounts-payable.edit', ['accounts_payable' => $this->payable->id]);
	}

    public function render()
    {
        return view('livewire.accounts-payable.read');
    }
}
