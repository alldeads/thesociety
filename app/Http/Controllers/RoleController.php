<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Exports\RoleExport;

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

    public function export(Request $request)
    {
    	$this->authorize('role.export');

    	$types = ['csv', 'pdf', 'xlsx', 'xls'];

    	$requested_type = isset($request['type']) ? strtolower($request['type']) : 'csv';
    	$q = $request['q'];

    	if ( !in_array($requested_type, $types) ) {
    		$requested_type = 'csv';
    	}

    	return (new RoleExport($q, $this->getCompany()->id))->download('roles-' . now()->format('Y-m-d') . '.' . $requested_type);
    }
}
