<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PurchaseOrder;
use App\Exports\PurchaseOrderExport;

use Dompdf\Dompdf;
use Illuminate\Support\Facades\View; 

class PurchaseOrderController extends Controller
{
    public function index()
    {
    	$this->authorize('purchase_order.view');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['name'=> "Purchase Orders"],
	    ];

		return view('purchase-order.index', [
	    	'breadcrumbs' => $breadcrumbs,
	    	'company'     => $this->company
	    ]);
    }

    public function create()
    {
    	$this->authorize('purchase_order.create');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('purchase-orders-view'), 'name'=>"Purchase Orders"],
	        ['name'=> "Create Purchase Order"],
	    ];

		return view('purchase-order.create', [
	    	'breadcrumbs' => $breadcrumbs,
	    	'company'     => $this->company
	    ]);
    }

    public function view(PurchaseOrder $purchase)
    {
    	$this->authorize('purchase_order.read');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('purchase-orders-view'), 'name'=>"Purchase Orders"],
	        ['name'=> $purchase->reference],
	    ];

		if ($purchase->company_id == $this->company->id) {
		    return view('purchase-order.view', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $this->company,
		    	'purchase'    => $purchase
		    ]);
		}

		return view('errors.403');
    }

    public function edit(PurchaseOrder $purchase)
    {
    	$this->authorize('purchase_order.update');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('purchase-orders-view'), 'name'=>"Purchase Orders"],
	        ['name'=> $purchase->reference],
	    ];

		if ($purchase->company_id == $this->company->id) {
		    return view('purchase-order.edit', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $this->company,
		    	'purchase'    => $purchase
		    ]);
		}

		return view('errors.403');
    }

    public function export(Request $request)
    {
    	$this->authorize('purchase_order.export');

    	$types = ['csv', 'pdf', 'xlsx', 'xls', 'ods'];

    	$requested_type = isset($request['type']) ? strtolower($request['type']) : 'csv';
    	$q = $request['q'];
    	$from = $request['from'];
    	$to = $request['to'];

    	// Set default type, if specified type is invalid
    	if ( !in_array($requested_type, $types) ) {
    		$requested_type = 'csv';
    	}

    	return (new PurchaseOrderExport($q, $this->company->id, $from, $to))->download('purchase-orders-' . now()->format('Y-m-d') . '.' . $requested_type);
    }

    public function download(PurchaseOrder $purchase)
    {
    	set_time_limit(60);

    	$company = $this->company;

    	$address['supplier_name']    = $purchase->supplier->user->profile->company ?? 'N/A';
		$address['supplier_address'] = $purchase->supplier->address ?? [];
		$address['supplier_phone']   = $purchase->supplier->user->profile->phone_number ?? null;
		$address['supplier_email']   = $purchase->supplier->user->email;

    	$pdf = \PDF::loadView('purchase-order.download', compact('company', 'purchase', 'address'));

		return $pdf->stream();

    	return view('purchase-order.download', compact('company'));
    }
}
