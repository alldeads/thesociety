<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Employee;
use App\Models\User;
use App\Exports\EmployeeExport;

class EmployeeController extends Controller
{
    public function index()
    {
    	$this->authorize('employee.view');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['name'=> "Employees"],
	    ];

	    return view('employee.index', [
            'breadcrumbs' => $breadcrumbs,
            'company'     => $this->getCompany()
        ]);
    }

    public function create()
    {
    	$this->authorize('employee.create');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('employees-view'), 'name'=> "Employees"],
	        ['name'=> "Create Employee"],
	    ];

		return view('employee.create', [
	    	'breadcrumbs' => $breadcrumbs,
	    	'company'     => $this->getCompany()
	    ]);
    }

    public function edit(Employee $emp)
    {
    	$this->authorize('employee.update');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('employees-view'), 'name'=> "Employees"],
	        ['name'=> $emp->user->profile->name ?? ''],
	    ];

	    if ($this->getCompany()->id == $emp->company_id) {
		    return view('employee.edit', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $this->getCompany(),
		    	'emp'         => $emp
		    ]);
		}
    }

    public function export(Request $request)
    {
    	$this->authorize('employee.export');

    	$types = ['csv', 'pdf', 'xlsx', 'xls', 'ods'];

    	$requested_type = isset($request['type']) ? strtolower($request['type']) : 'csv';
    	$q = $request['q'];
    	$from = $request['from'];
    	$to = $request['to'];

    	if ( !in_array($requested_type, $types) ) {
    		$requested_type = 'csv';
    	}

    	return (new EmployeeExport($q, $this->getCompany()->id, $from, $to))->download('employees-' . now()->format('Y-m-d') . '.' . $requested_type);
    }
}
