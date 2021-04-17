<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Company;

class TaxController extends Controller
{
    public function index()
    {
    	$response = Gate::inspect('tax.view');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['name'=>"Tax"],
	    ];

	    $company = Company::findOrFail(auth()->user()->empCard->company_id);

		if ( $response->allowed() ) {
		    return view('tax.index', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $company
		    ]);
		} else {
		    return view('misc.not-authorized');
		}
    }
}
