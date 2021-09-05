<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Company;
use App\Models\Product;
use App\Exports\ProductExport;

class ProductController extends Controller
{
    public function index()
    {
    	$this->authorize('product.view');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['name'=> "Products"],
	    ];

		return view('product.index', [
	    	'breadcrumbs' => $breadcrumbs,
	    	'company'     => $this->getCompany()
	    ]);
    }

    public function create()
    {
    	$this->authorize('product.create');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('products-view'), 'name'=>"Products"],
	        ['name'=> "Create Product"],
	    ];

		return view('product.create', [
	    	'breadcrumbs' => $breadcrumbs,
	    	'company'     => $this->getCompany()
	    ]);
    }

    public function view(Product $product)
    {
    	$this->authorize('product.read');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('products-view'), 'name'=>"Products"],
	        ['name'=> $product->name],
	    ];

		if ($product->company_id == $this->getCompany()->id) {
		    return view('product.read', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $this->getCompany(),
		    	'product'     => $product
		    ]);
		}

		return view('errors.403');
    }

    public function edit(Product $product)
    {
    	$this->authorize('product.update');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('products-view'), 'name'=>"Products"],
	        ['name'=> "Edit Product"],
	    ];

		if ($product->company_id == $this->getCompany()->id) {
		    return view('product.edit', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $this->getCompany(),
		    	'product'     => $product
		    ]);
		}

		return view('errors.403');
    }

    public function export(Request $request)
    {
        $this->authorize('product.export');

        $types = ['csv', 'pdf', 'xlsx', 'xls', 'ods'];

        $requested_type = isset($request['type']) ? strtolower($request['type']) : 'csv';
        $q = $request['q'];

        if ( !in_array($requested_type, $types) ) {
            $requested_type = 'csv';
        }

        return (new ProductExport($q, $this->getCompany()->id))->download('products-' . now()->format('Y-m-d') . '.' . $requested_type);
    }
}
