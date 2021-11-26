<?php

namespace App\Traits;

use Carbon\Carbon;

trait ExportTrait 
{   
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
