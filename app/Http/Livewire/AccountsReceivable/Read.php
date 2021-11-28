<?php

namespace App\Http\Livewire\AccountsReceivable;

use Livewire\Component;
use Carbon\Carbon;

class Read extends Component
{
    public $inputs = [];
	public $receivable;

    public function mount()
    {
        $receivable = $this->receivable;

		$this->inputs = [
			'posting_date'   => Carbon::parse($receivable->posting_date)->format('F j, Y'),
			'account_title'  => $receivable->chart_account->chart_name,
			'account_number' => $receivable->account_no ?? "N/A",
			'check_no'       => $receivable->check_no ?? "N/A",
			'amount'         => number_format($receivable->amount, 2, '.', ','),
			'payee'          => $receivable->user->profile->name,
			'attachment'     => $receivable->attachment ?? "No attachment.",
			'description'    => $receivable->description,
			'notes'          => $receivable->notes ?? "N/A",
            'status'         => $receivable->status ?? "N/A",
			'created_by'     => $receivable->user_created->profile->name ?? "N/A",
			'created_at'     => Carbon::parse($receivable->created_at)->format('F j, Y h:i a'),
			'updated_by'     => $receivable->user_updated->profile->name ?? "N/A",
			'updated_at'     => Carbon::parse($receivable->updated_at)->format('F j, Y h:i a'),
		];
    }

    public function create()
	{
		return redirect()->route('accounts-receivable.create');
	}

	public function edit()
	{
		return redirect()->route('accounts-receivable.edit', ['accounts_receivable' => $this->receivable->id]);
	}

    public function render()
    {
        return view('livewire.accounts-receivable.read');
    }
}
