<?php

namespace App\Http\Livewire\ChartOfAccount;

use App\Http\Livewire\CustomComponent;
use Illuminate\Support\Facades\Validator;

use App\Models\ChartType;
use App\Models\CompanyChartAccount;

class Create extends CustomComponent
{
	public $inputs = [
		'account_name',
		'account_code',
		'account_type'
	];

	public $company_id;
	public $types;

	public function mount()
	{
		$this->types = ChartType::all();
	}

	public function submit()
	{
		$validator = Validator::make($this->inputs, [
            'account_name'  => ['required', 'string', 'max:255'],
            'account_code'  => ['required', 'string', 'max:255'],
            'account_type'  => ['required', 'numeric', 'exists:chart_types,id'],
        ]);

        if ($validator->fails()) {
        	$error = $validator->errors();
            foreach ($error->all() as $message) {
			    $this->message($message, 'error');
			    break;
			}
        }

        CompanyChartAccount::create([
			'chart_name'    => $this->inputs['account_name'],
			'code'          => $this->inputs['account_code'],
			'chart_type_id' => $this->inputs['account_type'],
			'created_by'    => auth()->id(),
			'company_id'    => $this->company_id
		]);

		$this->emit('refreshChartParent');

        $this->message('New Account has been created', 'success');

        $this->inputs = [];

        $this->emit('dissmissModal', ['el' => 'modal-chart-create']);
	}

    public function render()
    {
        return view('livewire.chart-of-account.create');
    }
}
