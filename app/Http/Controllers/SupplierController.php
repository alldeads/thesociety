<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Company;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
    	$response = Gate::inspect('supplier.view');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['name'=> "Suppliers"],
	    ];

	    $company = Company::findOrFail(auth()->user()->empCard->company_id);

		if ( $response->allowed() ) {
		    return view('supplier.index', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $company
		    ]);
		} else {
		    return view('misc.not-authorized');
		}
    }

    public function create()
    {
    	$response = Gate::inspect('supplier.create');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('suppliers-view'), 'name'=> "Suppliers"],
	        ['name'=> "Create Supplier"],
	    ];

	    $company = Company::findOrFail(auth()->user()->empCard->company_id);

		if ( $response->allowed() ) {
		    return view('supplier.create', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $company
		    ]);
		} else {
		    return view('misc.not-authorized');
		}
    }

    public function view(Supplier $supplier)
    {
    	$response = Gate::inspect('supplier.read');

    	$company = Company::findOrFail(auth()->user()->empCard->company_id);

    	if ( $supplier->company_id != $company->id ) {
    		return view('misc.not-authorized');
    	}

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('suppliers-view'), 'name'=> "Suppliers"],
	        ['name'=> $supplier->user->profile->company], 
	    ];

		if ( $response->allowed() ) {
		    return view('supplier.read', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $company,
		    	'supplier'    => $supplier
		    ]);
		} else {
		    return view('misc.not-authorized');
		}
    }

    public function edit(Supplier $supplier)
    {
    	$response = Gate::inspect('supplier.update');

    	$company = Company::findOrFail(auth()->user()->empCard->company_id);

    	if ( $supplier->company_id != $company->id ) {
    		return view('misc.not-authorized');
    	}

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('suppliers-view'), 'name'=> "Suppliers"],
	        ['name'=> $supplier->user->profile->company], 
	    ];

		if ( $response->allowed() ) {
		    return view('supplier.edit', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $company,
		    	'supplier'    => $supplier
		    ]);
		} else {
		    return view('misc.not-authorized');
		}
    }
}
