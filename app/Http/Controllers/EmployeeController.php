<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Employee;

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

    public function create()
    {
    	$response = Gate::inspect('employee.create');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('employees-view'), 'name'=> "Employees"],
	        ['name'=> "Create Employee"],
	    ];

	    $company_id = auth()->user()->empCard->company_id ?? 0;

	    $employee = Employee::find($company_id);

		if ( $response->allowed() ) {
		    return view('employee.create', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $employee->company
		    ]);
		} else {
		    return view('misc.not-authorized');
		}
    }
}
