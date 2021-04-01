<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EmployeeController extends Controller
{
    public function get_all()
    {
    	$response = Gate::inspect('employee.view');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['name'=> "Employees"],
	    ];

		if ( $response->allowed() ) {
		    return view('employee.index', ['breadcrumbs' => $breadcrumbs]);
		} else {
		    return view('misc.not-authorized');
		}
    }
}
