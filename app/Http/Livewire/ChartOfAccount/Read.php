<?php

namespace App\Http\Livewire\ChartOfAccount;

use App\Http\Livewire\CustomComponent;

use App\Models\ChartType;
use App\Models\User;

use Carbon\Carbon;

class Read extends CustomComponent
{
	public $listeners = [
        'readChartAccount' => 'read'
    ];

    public $account;
    public $el = "modal-chart-read";
    public $inputs = [];

    public function read($account)
    {
    	$this->account = $account;

    	$created = User::find($this->account['account']['created_by']);
    	$updated = User::find($this->account['account']['updated_by']);

    	$this->inputs = [
    		'account_title' => $this->account['account']['chart_name'],
    		'account_code'  => $this->account['account']['code'],
    		'account_type'  => $this->account['account']['type']['name'],
    		'created_by'    => $created->profile->name ?? "N/A",
    		'created_at'    => Carbon::parse($this->account['account']['created_at'])->format('F j, Y h:i:s a'),
    		'updated_by'    => $updated->profile->name ?? "N/A",
    		'updated_at'    => Carbon::parse($this->account['account']['updated_at'])->format('F j, Y h:i:s a'),
    	];

    	$this->emit('showModal', ['el' => $this->el]);
    }

    public function render()
    {
        return view('livewire.chart-of-account.read');
    }
}
