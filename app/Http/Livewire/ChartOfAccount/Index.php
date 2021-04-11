<?php

namespace App\Http\Livewire\ChartOfAccount;

use App\Http\Livewire\CustomComponent;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

// use App\Models\Chart;

class Index extends CustomComponent
{
    public function render()
    {
        return view('livewire.chart-of-account.index');
    }
}
