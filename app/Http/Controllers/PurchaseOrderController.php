<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Company;
use App\Models\PurchaseOrder;

class PurchaseOrderController extends Controller
{
    public function index()
    {
    	$response = Gate::inspect('purchase_order.view');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['name'=> "Purchase Orders"],
	    ];

	    $company = Company::findOrFail(auth()->user()->empCard->company_id);

		if ( $response->allowed() ) {
		    return view('purchase-order.index', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $company
		    ]);
		} else {
		    return view('misc.not-authorized');
		}
    }

    public function create()
    {
    	$response = Gate::inspect('purchase_order.create');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('purchase-orders-view'), 'name'=>"Purchase Orders"],
	        ['name'=> "Create Purchase Order"],
	    ];

	    $company = Company::findOrFail(auth()->user()->empCard->company_id);

		if ( $response->allowed() ) {
		    return view('purchase-order.create', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $company
		    ]);
		} else {
		    return view('misc.not-authorized');
		}
    }

    public function view(PurchaseOrder $purchase)
    {
    	$response = Gate::inspect('purchase_order.read');

    	$company = Company::findOrFail(auth()->user()->empCard->company_id);

    	if ( $purchase->company_id !== $company->id ) {
    		return view('misc.not-authorized');
    	}

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('purchase-orders-view'), 'name'=>"Purchase Orders"],
	        ['name'=> $purchase->reference],
	    ];

		if ( $response->allowed() ) {
		    return view('purchase-order.view', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $company,
		    	'purchase'    => $purchase
		    ]);
		} else {
		    return view('misc.not-authorized');
		}
    }

    public function edit(PurchaseOrder $purchase)
    {
    	$response = Gate::inspect('purchase_order.update');

    	$company = Company::findOrFail(auth()->user()->empCard->company_id);

    	if ( $purchase->company_id !== $company->id ) {
    		return view('misc.not-authorized');
    	}

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('purchase-orders-view'), 'name'=>"Purchase Orders"],
	        ['name'=> $purchase->reference],
	    ];

		if ( $response->allowed() ) {
		    return view('purchase-order.edit', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $company,
		    	'purchase'    => $purchase
		    ]);
		} else {
		    return view('misc.not-authorized');
		}
    }
}
