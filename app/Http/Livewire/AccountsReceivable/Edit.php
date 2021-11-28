<?php

namespace App\Http\Livewire\AccountsReceivable;

use DB;
use App\Http\Livewire\CustomComponent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

use App\Models\User;
use App\Models\AccountsReceivable;

class Edit extends CustomComponent
{
    public $company_id;
    public $users;
    public $preference;
    public $receivable;

    public $inputs = [];

    public function mount()
    {
        $this->users    = User::perCompany()->doesntHave('empCard')->get();

        $this->resetBtn();
    }

    public function resetBtn()
    {
        $receivable = $this->receivable;

		$this->inputs = [
			'posting_date'   => $receivable->posting_date,
			'account_title'  => $receivable->account_type_id,
            'account_title_label' => $receivable->chart_account->chart_name ?? 'N/A',
			'account_number' => $receivable->account_no,
			'check_no'       => $receivable->check_no,
			'amount'         => $receivable->amount,
			'payor'          => $receivable->payor,
			'old_attachment' => $receivable->attachment,
			'description'    => $receivable->description,
			'notes'          => $receivable->notes,
            'status'         => $receivable->status
		];
        
        $this->emit('resetFile', 'attachment');
    }

    public function read()
	{
		return redirect()->route('accounts-receivable.show', ['accounts_receivable' => $this->receivable->id]);
	}

    public function submit()
    {
        Validator::make($this->inputs, [
            'account_title'  => ['required', 'numeric'],
            'account_number' => ['nullable'],
            'check_no'       => ['nullable'],
            'posting_date'   => ['required', 'date'],
            'amount'         => ['required', 'numeric'],
            'payor'          => ['required', 'numeric'],
            'description'    => ['required'],
            'notes'          => ['nullable'],
            'status'         => ['nullable', 'string'],
            'attachment'     => ['nullable', 'file'],
        ], [
            'payor.required'   => 'Payee or Payor is required.',
        ])->validate();

        try {
            DB::beginTransaction();

            $attachment = null;

            if ( isset($this->inputs['attachment']) ) {
                $attachment = Storage::url($this->inputs['attachment']->store('attachments'));
            }

            $ar = AccountsReceivable::find($this->receivable->id);

            $ar->fill([
                'updated_by'       => auth()->id(),
                'account_no'       => $this->inputs['account_number'] ?? null,
                'check_no'         => $this->inputs['check_no'] ?? null,
                'posting_date'     => $this->inputs['posting_date'],
                'description'      => $this->inputs['description'] ?? null,
                'payor'            => $this->inputs['payor'],
                'notes'            => $this->inputs['notes'] ?? null,
                'attachment'       => $attachment ?? null,
                'amount'           => $this->inputs['amount'] ?? null,
                'status'           => $this->inputs['status'] ?? null,
            ]);

            $ar->save();

            DB::commit();

            $this->emit('resetFile', 'attachment');

            $this->message('Accounts Receivable has been updated', 'success');

            $this->receivable = $ar;

        } catch (\Exception $e) {
            DB::rollback();

            $this->message('Oops, there was an error, please try again!', 'error');
        }
    }

    public function render()
    {
        return view('livewire.accounts-receivable.edit');
    }
}
