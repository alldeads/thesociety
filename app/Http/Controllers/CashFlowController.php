<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Company;
use App\Models\CashFlow;
use App\Exports\CashFlowExport;

class CashFlowController extends Controller
{
    public function index()
    {
    	$this->authorize('cashflow.view');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['name'=>"Cash Flow"],
	    ];

		return view('cash-flow.index', [
	    	'breadcrumbs' => $breadcrumbs,
	    	'company'     => $this->company
	    ]);
    }

    public function create()
    {
    	$this->authorize('cashflow.create');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('cash-flow'), 'name'=>"Cash Flow"], 
	        ['name'=>"New Entry"],
	    ];

		return view('cash-flow.create', [
	    	'breadcrumbs' => $breadcrumbs,
	    	'company'     => $this->company
	    ]);
    }

    public function view(CashFlow $cashflow)
    {
    	$this->authorize('cashflow.read');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('cash-flow'), 'name'=>"Cash Flow"], 
	        ['name'=>"View Entry"],
	    ];

		if ($this->company->id == $cashflow->company_id) {
		    return view('cash-flow.read', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'cashflow'    => $cashflow
		    ]);
		}

		return view('errors.403');
    }

    public function edit(CashFlow $cashflow)
    {
    	$this->authorize('cashflow.update');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('cash-flow'), 'name'=>"Cash Flow"], 
	        ['name'=>"Edit Entry"],
	    ];

		if ($this->company->id == $cashflow->company_id) {
		    return view('cash-flow.edit', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'cashflow'    => $cashflow
		    ]);
		}

		return view('errors.403');
    }

    public function export(Request $request)
    {
    	$this->authorize('cashflow.export');

    	$types = ['csv', 'pdf', 'xlsx', 'xls', 'ods'];

    	$requested_type = isset($request['type']) ? strtolower($request['type']) : 'csv';
    	$q = $request['q'];
    	$from = $request['from'];
    	$to = $request['to'];

    	if ( !in_array($requested_type, $types) ) {
    		$requested_type = 'csv';
    	}

	    return (new CashFlowExport($q, $this->company->id, $from, $to))->download('cash-flow-' . now()->format('Y-m-d') . '.' . $requested_type);
    }
}
