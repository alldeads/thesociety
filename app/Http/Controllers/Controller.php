<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Traits\CompanyTrait;
use App\Traits\ExportTrait;
use App\Traits\ResponseTrait;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, CompanyTrait, ResponseTrait;

    public function exportModule($request, $class, $company_id)
    {
    	$types = ['csv', 'pdf', 'xlsx', 'xls', 'ods'];

        $requested_type = isset($request['type']) ? strtolower($request['type']) : 'csv';

        $q    = $request['q'] ?? "";
        $from = $request['from'] ?? null;
    	$to   = $request['to'] ?? null;

        if ( !in_array($requested_type, $types) ) {
            $requested_type = 'csv';
        }

        $className = "\\App\\Exports\\" . $class;

        return (new $className($q, $company_id, $from, $to))->download($class . '-' . Carbon::now()->format('Y-m-d') . '.' . $requested_type);
    }
}
