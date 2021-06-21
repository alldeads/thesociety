<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Company;
use App\Models\JournalEntry;

use App\Exports\JournalEntryExport;

class JournalEntryController extends Controller
{
    public function index()
    {
    	$response = Gate::inspect('journal_entry.view');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['name'=>"Journal Entries"],
	    ];

	    $company = Company::getCompanyDetails();

		if ( $response->allowed() ) {
		    return view('journal-entry.index', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'company'     => $company
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

    	$response = Gate::inspect('journal_entry.export');

    	$company = Company::getCompanyDetails();

    	if ( $response->allowed() ) {
		    
		    // Set default type, if specified type is invalid
	    	if ( !in_array($requested_type, $types) ) {
	    		$requested_type = 'csv';
	    	}

	    	return (new JournalEntryExport($q, $company->id, $from, $to))
	    			->download('journal-entries' . now()->format('Y-m-d') . '.' . $requested_type);
		} else {
		    return view('misc.not-authorized');
		}
    }
}
