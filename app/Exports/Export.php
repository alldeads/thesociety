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
}