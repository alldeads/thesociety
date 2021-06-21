<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Company;
use App\Models\JournalEntry;

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
}
