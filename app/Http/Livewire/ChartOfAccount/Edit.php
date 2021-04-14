<?php

namespace App\Http\Livewire\ChartOfAccount;

use App\Http\Livewire\CustomComponent;
use Illuminate\Support\Facades\Validator;

use App\Models\CompanyChartAccount;
use App\Models\ChartType;

class Edit extends CustomComponent
{
	public $listeners = [
        'editChartAccount' => 'edit'
    ];

    public $account;
    public $el = "modal-chart-edit";
    public $inputs = [];
    public $types;

    public function mount()
    {
    	$this->types = ChartType::all();
    }

    public function edit($account)
    {
    	$this->account = $account;

    	$this->inputs = [
    		'account_title' => $this->account['account']['chart_name'],
    		'account_code'  => $this->account['account']['code'],
    		'account_type'  => $this->account['account']['chart_type_id'],
    	];

    	$this->emit('showModal', ['el' => $this->el]);
    }

    public function submit()
    {
    	$validator = Validator::make($this->inputs, [
            'account_title' => ['required', 'string', 'max:255'],
            'account_code'  => ['required', 'string', 'max:255'],
            'account_type'  => ['required', 'numeric', 'exists:chart_types,id'],
        ]);

        if ($validator->fails()) {
        	$error = $validator->errors();
            foreach ($error->all() as $message) {
			    $this->message($message, 'error');
			    return;
			}
        }

        $cca = CompanyChartAccount::find($this->account['account']['id']);

        $cca->fill([
			'chart_name'    => ucwords($this->inputs['account_title']),
			'code'          => $this->inputs['account_code'],
			'chart_type_id' => $this->inputs['account_type'],
			'updated_by'    => auth()->id()
		]);

		$cca->save();

		$this->emit('refreshChartItem');

        $this->message('Account has been updated', 'success');

        $this->inputs = [];

        $this->emit('dissmissModal', ['el' => $this->el]);
    }

    public function render()
    {
        return view('livewire.chart-of-account.edit');
    }
}
