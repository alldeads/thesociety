<?php

namespace App\Http\Livewire\Expense;

use DB;
use App\Http\Livewire\CustomComponent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

use App\Models\ChartType;
use App\Models\User;
use App\Models\CompanyChartAccount;
use App\Models\Expense;

class Edit extends CustomComponent
{
    public $company_id;
    public $accounts;
    public $users;
    public $expense;

    public $inputs = [];

    public function mount()
    {
        $this->accounts = CompanyChartAccount::perCompany()->expenses()->get();
        $this->users    = User::perCompany()->has('empCard')->get();

        $this->resetBtn();
    }

    public function resetBtn()
    {
        $expense = $this->expense;

		$this->inputs = [
			'posting_date'   => $expense->posting_date,
			'account_title'  => $expense->account_type_id,
			'account_number' => $expense->account_no,
			'check_no'       => $expense->check_no,
			'amount'         => $expense->amount,
			'payor'          => $expense->payor,
			'old_attachment' => $expense->attachment,
			'description'    => $expense->description,
			'notes'          => $expense->notes,
            'status'         => $expense->status
		];

		$this->emit('resetFile', 'attachment');
    }

    public function read()
	{
		return redirect()->route('expenses.show', ['expense' => $this->expense->id]);
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

            $exp = Expense::find($this->expense->id);

            $exp->fill([
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

            $exp->save();

            DB::commit();

            $this->emit('resetFile', 'attachment');

            $this->message('Expense has been updated', 'success');

            $this->expense = $exp;

        } catch (\Exception $e) {
            DB::rollback();

            $this->message('Oops, there was an error, please try again!', 'error');
        }
    }

    public function render()
    {
        return view('livewire.expense.edit');
    }
}
