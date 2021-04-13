<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Company;

class CustomerController extends Controller
{
    public function index()
    {
    	$response = Gate::inspect('customer.view');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['name'=> "Customers"],
	    ];

	    $company = Company::findOrFail(auth()->user()->empCard->company_id);

		if ( $response->allowed() ) {
		    return view('customer.index', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $company
		    ]);
		} else {
		    return view('misc.not-authorized');
		}
    }
}
