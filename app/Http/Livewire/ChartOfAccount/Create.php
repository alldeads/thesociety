<?php

namespace App\Http\Livewire\ChartOfAccount;

use App\Http\Livewire\CustomComponent;
use Illuminate\Support\Facades\Validator;

use App\Models\ChartType;
use App\Models\CompanyChartAccount;

class Create extends CustomComponent
{
	public $inputs;

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

        CompanyChartAccount::create([
			'chart_name'    => ucwords($this->inputs['account_title']),
			'code'          => $this->inputs['account_code'],
			'chart_type_id' => $this->inputs['account_type'],
			'created_by'    => auth()->id(),
			'company_id'    => $this->company_id
		]);

		cache()->forget('app-company-charts');

        $this->message('New Account has been created', 'success');

        $this->initialize();
	}

	public function initialize()
	{
		$this->inputs = [
			'account_title' => '',
			'account_code'  => '',
			'account_type'  => 0
		];
	}

    public function render()
    {
        return view('livewire.chart-of-account.create');
    }
}
