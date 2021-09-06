<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function index()
    {
    	$this->authorize('role.view');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['name'=> "Roles"],
	    ];

		return view('role.index', [
	    	'breadcrumbs' => $breadcrumbs,
	    	'company'     => $this->getCompany()
	    ]);
    }
}
