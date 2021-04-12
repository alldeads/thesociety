<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Company;

class CashFlowController extends Controller
{
    public function index()
    {
    	$response = Gate::inspect('chart.view');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['name'=>"Cash Flow"],
	    ];

	    $company = Company::findOrFail(auth()->user()->empCard->company_id);

		if ( $response->allowed() ) {
		    return view('cash-flow.index', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $company
		    ]);
		} else {
		    return view('misc.not-authorized');
		}
    }
}
