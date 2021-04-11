<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ChartOfAccountController extends Controller
{
    public function index()
    {
    	$response = Gate::inspect('chart.view');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['name'=>"Chart of Accounts"],
	    ];

		if ( $response->allowed() ) {
		    return view('chart-account.index', ['breadcrumbs' => $breadcrumbs]);
		} else {
		    return view('misc.not-authorized');
		}
    }
}
