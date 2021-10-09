<?php

namespace App\Http\Livewire\ChartOfAccount;

use App\Http\Livewire\CustomComponent;
use Carbon\Carbon;

class Read extends CustomComponent
{
    public $account;
    public $inputs;

    public function mount()
    {
    	$this->inputs = [
    		'account_title' => $this->account->chart_name,
    		'account_code'  => $this->account->code,
    		'account_type'  => $this->account->type->name ?? "N/A",
    		'created_by'    => $this->account->user_created->profile->name ?? "N/A",
    		'created_at'    => Carbon::parse($this->account->created_at)->format('F j, Y h:i:s a'),
    		'updated_by'    => $this->account->user_updated->profile->name ?? "N/A",
    		'updated_at'    => Carbon::parse($this->account->updated_at)->format('F j, Y h:i:s a'),
    	];
    }

    public function create()
    {
        return redirect()->route('chart-accounts.create');
    }

    public function render()
    {
        return view('livewire.chart-of-account.read');
    }
}
