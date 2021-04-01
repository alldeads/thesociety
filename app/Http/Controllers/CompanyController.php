<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Company;

class CompanyController extends Controller
{
    public function details()
    {
    	$response = Gate::inspect('company.view');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['name'=>"Company Details"],
	    ];

		if ( $response->allowed() ) {
		    return view('company.details', ['breadcrumbs' => $breadcrumbs]);
		} else {
		    return view('misc.not-authorized');
		}
    }

    public function edit()
    {
    	$response = Gate::inspect('company.update');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('company-details'), 'name'=>"Company"], 
	        ['name'=>"Edit"], 
	    ];

		if ( $response->allowed() ) {
		    return view('company.edit', ['breadcrumbs' => $breadcrumbs]);
		} else {
		    return view('misc.not-authorized');
		}
    }
}
