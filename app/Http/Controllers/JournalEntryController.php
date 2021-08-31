<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\JournalEntry;
use App\Exports\JournalEntryExport;

class JournalEntryController extends Controller
{
    public function index()
    {
    	$this->authorize('journal_entry.view');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['name'=>"Journal Entries"],
	    ];

		return view('journal-entry.index', [
	    	'breadcrumbs' => $breadcrumbs,
	    	'company'     => $this->getCompany()
	    ]);
    }

    public function create()
    {
    	$this->authorize('journal_entry.create');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('journal-entry'), 'name'=>"Journal Entries"], 
	        ['name'=>"Create Entry"],
	    ];

		return view('journal-entry.create', [
	    	'breadcrumbs' => $breadcrumbs,
	    	'company'     => $this->getCompany()
	    ]);
    }

    public function edit(JournalEntry $journal)
    {
    	$this->authorize('journal_entry.update');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('journal-entry'), 'name'=>"Journal Entries"], 
	        ['name'=>"Update Entry"],
	    ];

		if ($this->getCompany()->id == $journal->company_id) {
		    return view('journal-entry.edit', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'journal'     => $journal
		    ]);
		}

		return view('errors.403');
    }

    public function view(JournalEntry $journal)
    {
    	$this->authorize('journal_entry.read');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('journal-entry'), 'name'=>"Journal Entries"], 
	        ['name'=>"View Entry"],
	    ];

		if ($this->getCompany()->id == $journal->company_id) {
		    return view('journal-entry.read', [
		    	'breadcrumbs' => $breadcrumbs,
		    	'journal'     => $journal
		    ]);
		}

		return view('errors.403');
    }

    public function export(Request $request)
    {
    	$this->authorize('journal_entry.export');

    	$types = ['csv', 'pdf', 'xlsx', 'xls', 'ods'];

    	$requested_type = isset($request['type']) ? strtolower($request['type']) : 'csv';
    	$q = $request['q'];
    	$from = $request['from'];
    	$to = $request['to'];

    	// Set default type, if specified type is invalid
    	if ( !in_array($requested_type, $types) ) {
    		$requested_type = 'csv';
    	}

    	return (new JournalEntryExport($q, $this->getCompany()->id, $from, $to))->download('journal-entries-' . now()->format('Y-m-d') . '.' . $requested_type);
    }
}
