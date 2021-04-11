<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Company;

class ChartOfAccountController extends Controller
{
    public function index()
    {
    	$response = Gate::inspect('chart.view');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['name'=>"Chart of Accounts"],
	    ];

	    $company = Company::findOrFail(auth()->user()->empCard->company_id);

		if ( $response->allowed() ) {
		    return view('chart-account.index', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $company
		    ]);
		} else {
		    return view('misc.not-authorized');
		}
    }
}
