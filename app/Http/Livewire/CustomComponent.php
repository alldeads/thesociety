<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
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
    public $from;
    public $to;
    public $permission;
    public $export;
    public $file_types;
    public $placeholder;

    public function __construct()
    {
        $this->to      = Carbon::now()->format('Y-m-d');
        $this->limit   = 10;
        $this->search  = "";
        $this->file_types = [
            'csv'  => 'CSV',
            'pdf'  => 'PDF',
            'xls'  => 'EXCEL (xls)',
            'xlsx' => 'EXCEL (xlsx)',
            'ods'  => 'ODS'
        ];
    }
}
