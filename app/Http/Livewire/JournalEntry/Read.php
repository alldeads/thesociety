<?php

namespace App\Http\Livewire\JournalEntry;

use Livewire\Component;

use Carbon\Carbon;

class Read extends Component
{
    public $inputs = [];
    public $journal;

    public function mount($journal)
    {
        $amount = $journal->credit != 0 ? $journal->credit : $journal->debit;

        $this->inputs = [
            'posting_date'   => Carbon::parse($journal->posting_date)->format('F j, Y'),
            'account_title'  => $journal->chart_account->chart_name,
            'account_number' => $journal->account_no ?? "N/A",
            'check_no'       => $journal->check_no ?? "N/A",
            'movement'       => $journal->credit != 0 ? "Credit" : "Debit",
            'amount'         => number_format($amount, 2, '.', ','),
            'payee'          => $journal->user->profile->name,
            'attachment'     => $journal->attachment ?? "No attachment.",
            'description'    => $journal->description,
            'notes'          => $journal->notes ?? "N/A",
            'created_by'     => $journal->user_created->profile->name ?? "N/A",
            'created_at'     => Carbon::parse($journal->created_at)->format('F j, Y h:i a'),
            'updated_by'     => $journal->user_updated->profile->name ?? "N/A",
            'updated_at'     => Carbon::parse($journal->updated_at)->format('F j, Y h:i a'),
        ];
    }

    public function create()
    {
        return redirect()->route('journal-entry.create');
    }

    public function edit()
    {
        return redirect()->route('journal-entry.edit', ['journal_entry' => $this->journal->id]);
    }

    public function render()
    {
        return view('livewire.journal-entry.read');
    }
}
