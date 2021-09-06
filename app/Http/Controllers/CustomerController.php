<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Customer;
use App\Exports\CustomerExport;

class CustomerController extends Controller
{
    public function index()
    {
    	$this->authorize('customer.view');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['name'=> "Customers"],
	    ];

		return view('customer.index', [
	    	'breadcrumbs' => $breadcrumbs,
	    	'company'     => $this->getCompany()
	    ]);
    }

    public function create()
    {
    	$this->authorize('customer.create');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('customers-view'), 'name'=>"Customers"], 
	        ['name'=>"Create Customer"], 
	    ];

		return view('customer.create', [
	    	'breadcrumbs' => $breadcrumbs,
	    	'company'     => $this->getCompany()
	    ]);
    }

    public function view(Customer $customer)
    {
    	$this->authorize('customer.read');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('customers-view'), 'name'=>"Customers"],
	        ['name'=> ucwords($customer->user->profile->name)], 
	    ];

		if ($this->getCompany()->id == $customer->company_id) {
		 	return view('customer.read', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $this->getCompany(),
		    	'customer'    => $customer
		    ]);   
		}

		return view('errors.403');
    }

    public function edit(Customer $customer)
    {
    	$this->authorize('customer.update');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('customers-view'), 'name'=>"Customers"],
	        ['name'=> ucwords($customer->user->profile->name)], 
	    ];

		if ($this->getCompany()->id == $customer->company_id) {
		 	return view('customer.edit', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $this->getCompany(),
		    	'customer'    => $customer
		    ]);   
		}

		return view('errors.403');
    }

    public function export(Request $request)
    {
    	$this->authorize('customer.export');

    	$types = ['csv', 'pdf', 'xlsx', 'xls', 'ods'];

    	$requested_type = isset($request['type']) ? strtolower($request['type']) : 'csv';
    	$q = $request['q'];

    	if ( !in_array($requested_type, $types) ) {
    		$requested_type = 'csv';
    	}

    	return (new CustomerExport($q, $this->getCompany()->id))->download('customers-' . now()->format('Y-m-d') . '.' . $requested_type);
    }
}
