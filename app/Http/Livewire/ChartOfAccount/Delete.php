<?php

namespace App\Http\Livewire\ChartOfAccount;

use App\Http\Livewire\CustomComponent;

use App\Models\CompanyChartAccount;

class Delete extends CustomComponent
{
	public $listeners = [
        'deleteChartAccount' => 'delete'
    ];

    public $account;
    public $el = "delete-chart-item";

    public function delete($account)
    {
    	$this->account = $account;
    	$this->emit('showModal', ['el' => $this->el]);
    }

    public function confirm()
    {
    	$acc = CompanyChartAccount::find($this->account['account']['id']);

    	if ( !$acc ) {
    		$this->message('Oops! Something went wrong upon deletion, please try again!', 'error');
    	}

        $acc->updated_by = auth()->id();
        $acc->save();
    	$acc->delete();

    	$this->emit('dissmissModal', ['el' => $this->el]);
    	$this->message('Success! Account has been deleted.', 'success');
    	$this->emit('refreshChartParent');
    }

    public function render()
    {
        return view('livewire.chart-of-account.delete');
    }
}
