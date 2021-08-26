<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Company;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
    	$this->authorize('customer.view');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['name'=> "Customers"],
	    ];

	    $company = Company::getCompanyDetails();

		return view('customer.index', [
	    	'breadcrumbs' => $breadcrumbs,
	    	'company'     => $company
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

	    $company = Company::findOrFail(auth()->user()->empCard->company_id);

		return view('customer.create', [
	    	'breadcrumbs' => $breadcrumbs,
	    	'company'     => $company
	    ]);
    }

    public function view(Customer $customer)
    {
    	$response = Gate::inspect('customer.read');

    	$company = Company::findOrFail(auth()->user()->empCard->company_id);

    	if ( $customer->company_id != $company->id ) {
    		return view('misc.not-authorized');
    	}

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('customers-view'), 'name'=>"Customers"],
	        ['name'=> ucwords($customer->user->profile->name)], 
	    ];

		if ( $response->allowed() ) {
		    return view('customer.read', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $company,
		    	'customer'    => $customer
		    ]);
		} else {
		    return view('misc.not-authorized');
		}
    }

    public function edit(Customer $customer)
    {
    	$response = Gate::inspect('customer.update');

    	$company = Company::findOrFail(auth()->user()->empCard->company_id);

    	if ( $customer->company_id != $company->id ) {
    		return view('misc.not-authorized');
    	}

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('customers-view'), 'name'=>"Customers"],
	        ['name'=> ucwords($customer->user->profile->name)], 
	    ];

		if ( $response->allowed() ) {
		    return view('customer.edit', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $company,
		    	'customer'    => $customer
		    ]);
		} else {
		    return view('misc.not-authorized');
		}
    }
}
