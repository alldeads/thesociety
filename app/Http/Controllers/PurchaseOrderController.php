<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Company;
use App\Models\PurchaseOrder;

use Dompdf\Dompdf;
use Illuminate\Support\Facades\View; 

class PurchaseOrderController extends Controller
{
    public function index()
    {
    	$response = Gate::inspect('purchase_order.view');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['name'=> "Purchase Orders"],
	    ];

	    $company = Company::getCompanyDetails();

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

	    $company = Company::getCompanyDetails();

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

    	$company = Company::getCompanyDetails();

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('purchase-orders-view'), 'name'=>"Purchase Orders"],
	        ['name'=> $purchase->reference],
	    ];

		if ( $response->allowed() && ($purchase->company_id == $company->id) ) {
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

    	$company = Company::getCompanyDetails();

    	if ( $purchase->company_id !== $company->id ) {
    		return view('misc.not-authorized');
    	}

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('purchase-orders-view'), 'name'=>"Purchase Orders"],
	        ['name'=> $purchase->reference],
	    ];

		if ( $response->allowed() && ($purchase->company_id == $company->id) ) {
		    return view('purchase-order.edit', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $company,
		    	'purchase'    => $purchase
		    ]);
		} else {
		    return view('misc.not-authorized');
		}
    }

    public function download(PurchaseOrder $purchase)
    {
    	set_time_limit(60);

    	$company = Company::getCompanyDetails();

    	$address['supplier_name']    = $purchase->supplier->user->profile->company ?? 'N/A';
		$address['supplier_address'] = $purchase->supplier->address ?? [];
		$address['supplier_phone']   = $purchase->supplier->user->profile->phone_number ?? null;
		$address['supplier_email']   = $purchase->supplier->user->email;

    	$pdf = \PDF::loadView('purchase-order.download', compact('company', 'purchase', 'address'));

		return $pdf->stream();

    	return view('purchase-order.download', compact('company'));
    }
}
