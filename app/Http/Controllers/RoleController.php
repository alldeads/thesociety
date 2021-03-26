<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function get_all()
    {
    	$response = Gate::inspect('role.view');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['name'=> "Roles"],
	    ];

		if ( $response->allowed() ) {
		    return view('role.index', ['breadcrumbs' => $breadcrumbs]);
		} else {
		    return view('misc.not-authorized');
		}
    }
}
