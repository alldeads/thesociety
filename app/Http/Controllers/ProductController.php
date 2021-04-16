<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Company;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
    	$response = Gate::inspect('product.view');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['name'=> "Products"],
	    ];

	    $company = Company::findOrFail(auth()->user()->empCard->company_id);

		if ( $response->allowed() ) {
		    return view('product.index', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $company
		    ]);
		} else {
		    return view('misc.not-authorized');
		}
    }

    public function create()
    {
    	$response = Gate::inspect('product.create');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('products-view'), 'name'=>"Products"],
	        ['name'=> "Create Product"],
	    ];

	    $company = Company::findOrFail(auth()->user()->empCard->company_id);

		if ( $response->allowed() ) {
		    return view('product.create', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $company
		    ]);
		} else {
		    return view('misc.not-authorized');
		}
    }

    public function view(Product $product)
    {
    	$response = Gate::inspect('product.read');

    	$company = Company::findOrFail(auth()->user()->empCard->company_id);

    	if ( $product->company_id !== $company->id ) {
    		return view('misc.not-authorized');
    	}

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('products-view'), 'name'=>"Products"],
	        ['name'=> $product->name],
	    ];

		if ( $response->allowed() ) {
		    return view('product.read', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $company,
		    	'product'     => $product
		    ]);
		} else {
		    return view('misc.not-authorized');
		}
    }

    public function edit(Product $product)
    {
    	$response = Gate::inspect('product.update');

    	$company = Company::findOrFail(auth()->user()->empCard->company_id);

    	if ( $product->company_id !== $company->id ) {
    		return view('misc.not-authorized');
    	}

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('products-view'), 'name'=>"Products"],
	        ['name'=> "Edit Product"],
	    ];

		if ( $response->allowed() ) {
		    return view('product.edit', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $company,
		    	'product'     => $product
		    ]);
		} else {
		    return view('misc.not-authorized');
		}
    }
}
