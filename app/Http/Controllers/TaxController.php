<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Company;
use App\Exports\TaxExport;

class TaxController extends Controller
{
    public function index()
    {
    	$response = Gate::inspect('tax.view');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['name'=>"Tax"],
	    ];

	    $company = Company::getCompanyDetails();

		if ( $response->allowed() ) {
		    return view('tax.index', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $company
		    ]);
		} else {
		    return view('misc.not-authorized');
		}
    }

    public function export(Request $request)
    {
    	$types = ['csv', 'pdf', 'xlsx', 'xls', 'ods'];

    	$requested_type = isset($request['type']) ? strtolower($request['type']) : 'csv';
    	$q = $request['q'];

    	$response = Gate::inspect('tax.export');

    	$company = Company::getCompanyDetails();

    	if ( $response->allowed() ) {
		    
		    // Set default type, if specified type is invalid
	    	if ( !in_array($requested_type, $types) ) {
	    		$requested_type = 'csv';
	    	}

	    	return (new TaxExport($q, $company->id))
	    			->download('tax-' . now()->format('Y-m-d') . '.' . $requested_type);
		} else {
		    return view('misc.not-authorized');
		}
    }
}
