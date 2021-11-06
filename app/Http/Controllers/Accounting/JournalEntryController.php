<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use App\Models\JournalEntry;
use Illuminate\Http\Request;

class JournalEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('journal_entry.create');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['link'=> route('journal-entry.index'), 'name'=>"Journal Entries"], 
            ['name'=>"Create Entry"],
        ];

        return view('journal-entry.create', [
            'breadcrumbs' => $breadcrumbs,
            'company'     => $this->getCompany()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('journal_entry.read');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['link'=> route('journal-entry.index'), 'name'=>"Journal Entries"], 
            ['name'=>"View Entry"],
        ];

        $journal = JournalEntry::findOrFail($id);

        if ($this->getCompany()->id == $journal->company_id) {
            return view('journal-entry.read', [
                'breadcrumbs' => $breadcrumbs,
                'journal'     => $journal
            ]);
        }

        return view('errors.403');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('journal_entry.update');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['link'=> route('journal-entry.index'), 'name'=>"Journal Entries"], 
            ['name'=>"Update Entry"],
        ];

        $journal = JournalEntry::findOrFail($id);

        if ($this->getCompany()->id == $journal->company_id) {
            return view('journal-entry.edit', [
                'breadcrumbs' => $breadcrumbs,
                'journal'     => $journal
            ]);
        }

        return view('errors.403');
    }

    /**
     * Export module
     *
     * @param  Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request)
    {
        $this->authorize('journal_entry.export');

        return $this->exportModule($request->all(), 'JournalEntryExport', $this->getCompany()->id);
    }
}
