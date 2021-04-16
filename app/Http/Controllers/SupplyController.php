<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Company;
use App\Models\Product;

class SupplyController extends Controller
{
    public function index()
    {
    	$response = Gate::inspect('supply.view');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['name'=> "Supplies"],
	    ];

	    $company = Company::findOrFail(auth()->user()->empCard->company_id);

		if ( $response->allowed() ) {
		    return view('supply.index', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $company
		    ]);
		} else {
		    return view('misc.not-authorized');
		}
    }

    public function create()
    {
    	$response = Gate::inspect('supply.create');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('supplies-view'), 'name'=>"Supplies"],
	        ['name'=> "Create Supply"],
	    ];

	    $company = Company::findOrFail(auth()->user()->empCard->company_id);

		if ( $response->allowed() ) {
		    return view('supply.create', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $company
		    ]);
		} else {
		    return view('misc.not-authorized');
		}
    }

    public function view(Product $product)
    {
    	$response = Gate::inspect('supply.read');

    	$company = Company::findOrFail(auth()->user()->empCard->company_id);

    	if ( $product->company_id !== $company->id ) {
    		return view('misc.not-authorized');
    	}

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('supplies-view'), 'name'=>"Supplies"],
	        ['name'=> $product->name],
	    ];

		if ( $response->allowed() ) {
		    return view('supply.read', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $company,
		    	'supply'      => $product
		    ]);
		} else {
		    return view('misc.not-authorized');
		}
    }

    public function edit(Product $product)
    {
    	$response = Gate::inspect('supply.update');

    	$company = Company::findOrFail(auth()->user()->empCard->company_id);

    	if ( $product->company_id !== $company->id ) {
    		return view('misc.not-authorized');
    	}

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('supplies-view'), 'name'=>"Supplies"],
	        ['name'=> "Edit Supply"],
	    ];

		if ( $response->allowed() ) {
		    return view('supply.edit', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $company,
		    	'supply'      => $product
		    ]);
		} else {
		    return view('misc.not-authorized');
		}
    }
}
