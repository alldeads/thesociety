<?php

namespace App\Http\Livewire\ChartOfAccount;

use App\Http\Livewire\CustomComponent;
use Illuminate\Support\Facades\Validator;

use App\Models\ChartAccount;
use App\Models\ChartType;

class Edit extends CustomComponent
{
    public $account;
    public $inputs = [];
    public $types;

    public function mount()
    {
    	$this->types = ChartType::getChartTypes();

        $this->initialize();
    }

    public function submit()
    {
    	$validator = Validator::make($this->inputs, [
            'account_title' => ['required', 'string', 'max:255'],
            'account_code'  => ['required', 'string', 'max:255'],
            'account_type'  => ['required', 'numeric', 'exists:chart_types,id'],
        ])->validate();

        $cca = ChartAccount::find($this->account->id);

        $cca->fill([
			'name'          => ucwords($this->inputs['account_title']),
			'code'          => $this->inputs['account_code'],
			'chart_type_id' => $this->inputs['account_type'],
			'updated_by'    => auth()->id()
		]);

		$cca->save();

		$this->emit('refreshChartItem');

        $this->message('Account has been updated', 'success');

        $this->account = $cca;
    }

    public function initialize()
    {
        $this->inputs = [
            'account_title' => $this->account->name,
            'account_code'  => $this->account->code,
            'account_type'  => $this->account->chart_type_id,
        ];
    }

    public function read()
    {
        return redirect()->route('chart-accounts.show', [$this->account->id]);
    }

    public function render()
    {
        return view('livewire.chart-of-account.edit');
    }
}
