<?php

namespace App\Http\Livewire\AccountsPayable;

use DB;
use App\Http\Livewire\CustomComponent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

use App\Models\User;
use App\Models\AccountsPayable;

class Create extends CustomComponent
{
    public $company_id;
    public $users;
    public $preference;

    public $inputs = [];

    public function mount()
    {
        $this->users    = User::perCompany()->has('empCard')->get();

        $this->resetBtn();
    }

    public function resetBtn()
    {
        $this->inputs = [];

        $this->inputs['posting_date']  = Carbon::now()->format('Y-m-d');
        $this->inputs['account_title'] = $this->preference->account_payable;
        $this->inputs['account_title_label'] = $this->preference->payable->chart_name ?? 'N/A';
        
        $this->emit('resetFile', 'attachment');
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

            AccountsPayable::create([
                'company_id'       => $this->company_id,
                'created_by'       => auth()->id(),
                'updated_by'       => auth()->id(),
                'account_type_id'  => $this->inputs['account_title'],
                'account_no'       => $this->inputs['account_number'] ?? null,
                'check_no'         => $this->inputs['check_no'] ?? null,
                'posting_date'     => $this->inputs['posting_date'],
                'description'      => $this->inputs['description'] ?? null,
                'payor'            => $this->inputs['payor'],
                'notes'            => $this->inputs['notes'] ?? null,
                'attachment'       => $attachment ?? null,
                'amount'           => $this->inputs['amount'] ?? null,
            ]);

            DB::commit();

            $this->emit('resetFile', 'attachment');

            $this->message('New Accounts Payable has been created', 'success');

            $this->inputs = [];

        } catch (\Exception $e) {
            DB::rollback();

            $this->message('Oops, there was an error, please try again!', 'error');
        }
    }

    public function render()
    {
        return view('livewire.accounts-payable.create');
    }
}
