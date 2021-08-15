<?php

namespace App\Http\Livewire\Branch;

use App\Http\Livewire\CustomComponent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;

use App\Models\Branch;

class Create extends CustomComponent
{
    public $inputs = [];
    public $company_id;

    public function render()
    {
        return view('livewire.branch.create');
    }
}
