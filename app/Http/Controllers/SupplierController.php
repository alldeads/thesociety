<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Supplier;
use App\Exports\SupplierExport;

class SupplierController extends Controller
{
    public function index()
    {
    	$this->authorize('supplier.view');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['name'=> "Suppliers"],
	    ];

		return view('supplier.index', [
	    	'breadcrumbs' => $breadcrumbs,
	    	'company'     => $this->getCompany()
	    ]);
    }

    public function create()
    {
    	$this->authorize('supplier.create');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('suppliers-view'), 'name'=> "Suppliers"],
	        ['name'=> "Create Supplier"],
	    ];

		return view('supplier.create', [
	    	'breadcrumbs' => $breadcrumbs,
	    	'company'     => $this->getCompany()
	    ]);
    }

    public function view(Supplier $supplier)
    {
    	$this->authorize('supplier.read');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('suppliers-view'), 'name'=> "Suppliers"],
	        ['name'=> $supplier->user->profile->company], 
	    ];

		if ($supplier->company_id == $this->getCompany()->id) {
		    return view('supplier.read', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $this->getCompany(),
		    	'supplier'    => $supplier
		    ]);
		}

		return view('errors.403');
    }

    public function edit(Supplier $supplier)
    {
    	$this->authorize('supplier.update');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('suppliers-view'), 'name'=> "Suppliers"],
	        ['name'=> $supplier->user->profile->company], 
	    ];

		if ($supplier->company_id == $this->getCompany()->id) {
		    return view('supplier.edit', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $this->getCompany(),
		    	'supplier'    => $supplier
		    ]);
		}

		return view('errors.403');
    }

    public function export(Request $request)
    {
    	$this->authorize('supplier.export');

    	$types = ['csv', 'pdf', 'xlsx', 'xls', 'ods'];

    	$requested_type = isset($request['type']) ? strtolower($request['type']) : 'csv';
    	$q = $request['q'];
    	$from = $request['from'];
    	$to = $request['to'];

    	// Set default type, if specified type is invalid
    	if ( !in_array($requested_type, $types) ) {
    		$requested_type = 'csv';
    	}

    	return (new SupplierExport($q, $this->getCompany()->id, $from, $to))->download('suppliers-' . now()->format('Y-m-d') . '.' . $requested_type);
    }
}
