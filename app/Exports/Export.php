<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;

class Export
{
	use Exportable;

	public $search;
	public $company_id;
	public $from;
	public $to;

	public function __construct($search, $company_id, $from, $to)
    {
        $this->search     = $search;
        $this->company_id = $company_id;
        $this->from       = $from;
        $this->to         = $to;
    }
}