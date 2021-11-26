<?php

namespace App\Http\Livewire\Expense;

use Livewire\Component;
use Carbon\Carbon;

class Read extends Component
{
    public $inputs = [];
	public $expense;

	public function mount()
	{
        $expense = $this->expense;
        
		$this->inputs = [
			'posting_date'   => Carbon::parse($expense->posting_date)->format('F j, Y'),
			'account_title'  => $expense->chart_account->chart_name,
			'account_number' => $expense->account_no ?? "N/A",
			'check_no'       => $expense->check_no ?? "N/A",
			'amount'         => number_format($expense->amount, 2, '.', ','),
			'payee'          => $expense->user->profile->name,
			'attachment'     => $expense->attachment ?? "No attachment.",
			'description'    => $expense->description,
			'notes'          => $expense->notes ?? "N/A",
            'status'         => $expense->status ?? "N/A",
			'created_by'     => $expense->user_created->profile->name ?? "N/A",
			'created_at'     => Carbon::parse($expense->created_at)->format('F j, Y h:i a'),
			'updated_by'     => $expense->user_updated->profile->name ?? "N/A",
			'updated_at'     => Carbon::parse($expense->updated_at)->format('F j, Y h:i a'),
		];
	}

	public function create()
	{
		return redirect()->route('expenses.create');
	}

	public function edit()
	{
		return redirect()->route('expenses.edit', ['expense' => $this->expense->id]);
	}

    public function render()
    {
        return view('livewire.expense.read');
    }
}
