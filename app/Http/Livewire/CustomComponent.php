<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

use App\Traits\ResponseTrait;

class CustomComponent extends Component
{
	use ResponseTrait, WithFileUploads, WithPagination;

    protected $paginationTheme = 'bootstrap';
    
	public $company_id;
    public $search;
    public $limit;
    public $date_from;
    public $date_to;
    public $export;
}
