<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Company;
use App\Models\Supplier;

use App\Exports\SupplierExport;

class SupplierController extends Controller
{
    public function index()
    {
    	$response = Gate::inspect('supplier.view');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['name'=> "Suppliers"],
	    ];

	    $company = Company::getCompanyDetails();

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

	    $company = Company::getCompanyDetails();

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

    	$company = Company::getCompanyDetails();

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('suppliers-view'), 'name'=> "Suppliers"],
	        ['name'=> $supplier->user->profile->company], 
	    ];

		if ( $response->allowed() && ($supplier->company_id == $company->id) ) {
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

    	$company = Company::getCompanyDetails();

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('suppliers-view'), 'name'=> "Suppliers"],
	        ['name'=> $supplier->user->profile->company], 
	    ];

		if ( $response->allowed() && ($supplier->company_id == $company->id) ) {
		    return view('supplier.edit', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $company,
		    	'supplier'    => $supplier
		    ]);
		} else {
		    return view('misc.not-authorized');
		}
    }

    public function export(Request $request)
    {
    	$types = ['csv', 'pdf', 'xlsx', 'xls', 'ods'];

    	$requested_type = isset($request['type']) ? strtolower($request['type']) : 'csv';
    	$q = $request['q'];
    	$from = $request['from'];
    	$to = $request['to'];

    	$response = Gate::inspect('supplier.export');

    	$company = Company::getCompanyDetails();

    	if ( $response->allowed() ) {
		    
		    // Set default type, if specified type is invalid
	    	if ( !in_array($requested_type, $types) ) {
	    		$requested_type = 'csv';
	    	}

	    	return (new SupplierExport($q, $company->id, $from, $to))
	    			->download('suppliers-' . now()->format('Y-m-d') . '.' . $requested_type);
		} else {
		    return view('misc.not-authorized');
		}
    }
}
