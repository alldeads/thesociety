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
    public $dates;
    public $defined_dates;
    public $columns;
    public $default_date;
    public $filters;

    public function __construct()
    {
        $this->limit   = 10;
        $this->search  = "";

        $this->file_types = [
            'csv'  => 'CSV',
            'pdf'  => 'PDF',
            'xls'  => 'EXCEL (xls)',
            'xlsx' => 'EXCEL (xlsx)',
            'ods'  => 'ODS'
        ];

        $this->dates = [
            'today' => [
                Carbon::now()->format('Y-m-d'),
                Carbon::now()->format('Y-m-d')
            ],
            'yesterday' => [
                Carbon::now()->yesterday()->format('Y-m-d'),
                Carbon::now()->yesterday()->format('Y-m-d'),
            ],
            'this-week' => [
                Carbon::now()->startOfWeek()->format('Y-m-d'),
                Carbon::now()->endOfWeek()->format('Y-m-d')
            ],
            'last-week' => [
                Carbon::now()->subWeek()->startOfWeek()->format('Y-m-d'),
                Carbon::now()->subWeek()->endOfWeek()->format('Y-m-d'),
            ],
            'this-month' => [
                Carbon::now()->startOfMonth()->format('Y-m-d'),
                Carbon::now()->endOfMonth()->format('Y-m-d'),
            ],
            'last-month' => [
                Carbon::now()->subMonth()->startOfMonth()->format('Y-m-d'),
                Carbon::now()->subMonth()->endOfMonth()->format('Y-m-d'),
            ],
            'last-3-months' => [
                Carbon::now()->subMonth(3)->startOfMonth()->format('Y-m-d'),
                Carbon::now()->endOfMonth()->format('Y-m-d'),
            ],
            'last-6-months' => [
                Carbon::now()->subMonth(6)->startOfMonth()->format('Y-m-d'),
                Carbon::now()->endOfMonth()->format('Y-m-d'),
            ]
        ];

        $this->to      = $this->dates['this-month'][1];
        $this->from    = $this->dates['this-month'][0];
        $this->defined_dates = 'this-month';
        $this->filters = [];
    }

    public function getColumns()
    {
        $count = count($this->columns);

        return $this->isUserHasPermissions() ? $count + 1 : $count;
    }

    public function isUserHasPermissions()
    {
        $permissions   = ['read', 'create', 'update'];

        foreach ($permissions as $permission) {
            if (auth()->user()->can($this->permission . '.' . $permission)) {
                return true;
            }
        }

        return false;
    }
}
