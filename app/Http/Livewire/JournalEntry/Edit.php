<?php

namespace App\Http\Livewire\JournalEntry;

use App\Http\Livewire\CustomComponent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;

use App\Models\ChartType;
use App\Models\User;
use App\Models\CompanyChartAccount;
use App\Models\JournalEntry;

class Edit extends CustomComponent
{
    public $company_id;
    public $accounts;
    public $users;
    public $journal;

    public $inputs = [];

    public function mount($journal)
    {
        $this->accounts = CompanyChartAccount::getCompanyCharts();
        $this->users    = User::getCompanyUsers();
        $this->journal = $journal;

        $this->resetBtn();
    }

    public function resetBtn()
    {
        $journal = $this->journal;

        $amount = $journal->credit != 0 ? $journal->credit : $journal->debit;

        $this->inputs = [
            'posting_date'   => $journal->posting_date,
            'account_title'  => $journal->account_type_id,
            'account_number' => $journal->account_no,
            'check_no'       => $journal->check_no,
            'movement'       => $journal->credit != 0 ? "cr" : "dr",
            'amount'         => $amount,
            'payor'          => $journal->payor,
            'old_attachment' => $journal->attachment,
            'description'    => $journal->description,
            'notes'          => $journal->notes
        ];

        $this->emit('resetFile', 'attachment');
    }

    public function read()
    {
        return redirect()->route('journal-entry-read', ['journal' => $this->journal->id]);
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

        $je = JournalEntry::find($this->journal->id);

        $data = [];

        if ( $this->inputs['movement'] == "cr" ) {
            $data['credit']  = $this->inputs['amount'];
        } else {
            $data['debit']   = $this->inputs['amount'];
        }

        $je->fill([
            'credit'   => $data['credit'] ?? 0,
            'debit'    => $data['debit'] ?? 0,
        ]);

        $attachment = $je->attachment;

        if ( isset($this->inputs['attachment']) ) {
            $attachment = Storage::url($this->inputs['attachment']->store('attachments'));
        } 

        $je->fill([
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

        $je->save();

        $this->inputs['old_attachment'] = $attachment;

        $this->message('Entry has been updated.', 'success');
    }

    public function render()
    {
        return view('livewire.journal-entry.edit');
    }
}
