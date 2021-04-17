<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Traits\ResponseTrait;

class CustomComponent extends Component
{
	use ResponseTrait, WithFileUploads;
}
