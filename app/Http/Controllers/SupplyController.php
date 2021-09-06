<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Company;
use App\Models\Product;
use App\Exports\SupplyExport;

class SupplyController extends Controller
{
    public function index()
    {
    	$this->authorize('supply.view');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['name'=> "Supplies"],
	    ];

		return view('supply.index', [
	    	'breadcrumbs' => $breadcrumbs,
	    	'company'     => $this->getCompany()
	    ]);
    }

    public function create()
    {
    	$this->authorize('supply.create');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('supplies-view'), 'name'=>"Supplies"],
	        ['name'=> "Create Supply"],
	    ];

		return view('supply.create', [
	    	'breadcrumbs' => $breadcrumbs,
	    	'company'     => $this->getCompany()
	    ]);
    }

    public function view(Product $product)
    {
    	$this->authorize('supply.read');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('supplies-view'), 'name'=>"Supplies"],
	        ['name'=> $product->name],
	    ];

		if ($product->company_id == $this->getCompany()->id) {
		    return view('supply.read', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $this->getCompany(),
		    	'supply'      => $product
		    ]);
		}

		return view('errors.403');
    }

    public function edit(Product $product)
    {
    	$this->authorize('supply.update');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('supplies-view'), 'name'=>"Supplies"],
	        ['name'=> "Edit Supply"],
	    ];

		if ($product->company_id == $this->getCompany()->id) {
		    return view('supply.edit', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $this->getCompany(),
		    	'supply'      => $product
		    ]);
		}

		return view('errors.403');
    }

    public function export(Request $request)
    {
        $this->authorize('supply.export');

        $types = ['csv', 'pdf', 'xlsx', 'xls', 'ods'];

        $requested_type = isset($request['type']) ? strtolower($request['type']) : 'csv';
        $q = $request['q'];

        if ( !in_array($requested_type, $types) ) {
            $requested_type = 'csv';
        }

        return (new SupplyExport($q, $this->getCompany()->id))->download('supplies-' . now()->format('Y-m-d') . '.' . $requested_type);
    }
}
