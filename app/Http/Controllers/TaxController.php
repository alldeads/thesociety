<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\TaxExport;

class TaxController extends Controller
{
    public function index()
    {
    	$this->authorize('tax.view');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['name'=>"Tax"],
	    ];

		return view('tax.index', [
	    	'breadcrumbs' => $breadcrumbs,
	    	'company'     => $this->company
	    ]);
    }

    public function export(Request $request)
    {
    	$this->authorize('tax.export');

    	$types = ['csv', 'pdf', 'xlsx', 'xls', 'ods'];

    	$requested_type = isset($request['type']) ? strtolower($request['type']) : 'csv';
    	$q = $request['q'];

    	// Set default type, if specified type is invalid
    	if ( !in_array($requested_type, $types) ) {
    		$requested_type = 'csv';
    	}

    	return (new TaxExport($q, $this->company->id))->download('tax-' . now()->format('Y-m-d') . '.' . $requested_type);
    }
}
