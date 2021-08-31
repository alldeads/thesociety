<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\ChartAccountExport;
use App\Models\Company;

class ChartOfAccountController extends Controller
{
    public function index()
    {
    	$this->authorize('chart.view');

    	$breadcrumbs = [
	        ['link' => route('home'), 'name'=>"Dashboard"], 
	        ['name' =>"Chart of Accounts"],
	    ];

		return view('chart-account.index', [
	    	'breadcrumbs' => $breadcrumbs,
	    	'company'     => $this->getCompany()
	    ]);
    }

    public function export(Request $request)
    {
    	$this->authorize('chart.export');

    	$types = ['csv', 'pdf', 'xlsx', 'xls', 'ods'];

    	$requested_type = isset($request['type']) ? strtolower($request['type']) : 'csv';
    	$q = $request['q'];

    	if ( !in_array($requested_type, $types) ) {
    		$requested_type = 'csv';
    	}

    	return (new ChartAccountExport($q, $this->getCompany()->id))->download('chart-of-accounts-' . now()->format('Y-m-d') . '.' . $requested_type);
    }
}
