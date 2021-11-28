<?php

namespace App\Http\Livewire\AccountsPayable;

use DB;
use App\Http\Livewire\CustomComponent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

use App\Models\User;
use App\Models\AccountsPayable;

class Edit extends CustomComponent
{
    public $company_id;
    public $users;
    public $preference;
    public $payable;

    public $inputs = [];

    public function mount()
    {
        $this->users    = User::perCompany()->doesntHave('empCard')->get();

        $this->resetBtn();
    }

    public function resetBtn()
    {
        $payable = $this->payable;

		$this->inputs = [
			'posting_date'   => $payable->posting_date,
			'account_title'  => $payable->account_type_id,
            'account_title_label' => $payable->chart_account->chart_name ?? 'N/A',
			'account_number' => $payable->account_no,
			'check_no'       => $payable->check_no,
			'amount'         => $payable->amount,
			'payor'          => $payable->payor,
			'old_attachment' => $payable->attachment,
			'description'    => $payable->description,
			'notes'          => $payable->notes,
            'status'         => $payable->status
		];
        
        $this->emit('resetFile', 'attachment');
    }

    public function read()
	{
		return redirect()->route('accounts-payable.show', ['accounts_payable' => $this->payable->id]);
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

            $ap = AccountsPayable::find($this->payable->id);

            $ap->fill([
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

            $ap->save();

            DB::commit();

            $this->emit('resetFile', 'attachment');

            $this->message('Accounts Payable has been updated', 'success');

            $this->payable = $ap;

        } catch (\Exception $e) {
            DB::rollback();

            $this->message('Oops, there was an error, please try again!', 'error');
        }
    }

    public function render()
    {
        return view('livewire.accounts-payable.edit');
    }
}
