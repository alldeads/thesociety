<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Company;
use App\Models\CashFlow;
use App\Exports\CashFlowExport;

class CashFlowController extends Controller
{
    public function index()
    {
    	$response = Gate::inspect('cashflow.view');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['name'=>"Cash Flow"],
	    ];

	    $company = Company::getCompanyDetails();

		if ( $response->allowed() ) {
		    return view('cash-flow.index', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $company
		    ]);
		} else {
		    return view('misc.not-authorized');
		}
    }

    public function create()
    {
    	$response = Gate::inspect('cashflow.create');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('cash-flow'), 'name'=>"Cash Flow"], 
	        ['name'=>"New Entry"],
	    ];

	    $company = Company::getCompanyDetails();

		if ( $response->allowed() ) {
		    return view('cash-flow.create', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $company
		    ]);
		} else {
		    return view('misc.not-authorized');
		}
    }

    public function view(CashFlow $cashflow)
    {
    	$response = Gate::inspect('cashflow.read');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('cash-flow'), 'name'=>"Cash Flow"], 
	        ['name'=>"View Entry"],
	    ];

	    $company = Company::getCompanyDetails();

		if ( $response->allowed() && ($company->id == $cashflow->company_id) ) {
		    return view('cash-flow.read', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'cashflow'    => $cashflow
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
    	$from = $request['from'];
    	$to = $request['to'];

    	$response = Gate::inspect('cashflow.export');

    	$company = Company::getCompanyDetails();

    	if ( $response->allowed() ) {
		    
		    // Set default type, if specified type is invalid
	    	if ( !in_array($requested_type, $types) ) {
	    		$requested_type = 'csv';
	    	}

	    	return (new CashFlowExport($q, $company->id, $from, $to))
	    			->download('cash-flow' . now()->format('Y-m-d') . '.' . $requested_type);
		} else {
		    return view('misc.not-authorized');
		}
    }
}
