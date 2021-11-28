<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Preference;
use App\Models\AccountsReceivable;

class AccountsReceivableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('accounts_receivable.view');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['name'=>"Accounts Receivable"],
        ];

        return view('accounts-receivable.index', [
            'breadcrumbs' => $breadcrumbs,
            'company'     => $this->getCompany(),
            'showPage'    => $this->showPage()
            // 'reports'     => Expense::getExpensesReport()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('accounts_receivable.create');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['link'=> route('accounts-receivable.index'), 'name'=>"Accounts Receivable"], 
            ['name'=>"New Accounts Receivable"],
        ];

        return view('accounts-receivable.create', [
            'breadcrumbs' => $breadcrumbs,
            'company'     => $this->getCompany(),
            'showPage'    => $this->showPage()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Export module
     *
     * @param  Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request)
    {
        $this->authorize('accounts_receivable.export');

        return $this->exportModule($request->all(), 'AccountsReceivableExport', $this->getCompany()->id);
    }

    private function showPage()
    {
        $showPage = true;

        $preference = Preference::perCompany()->first();

        if ( !$preference || !$preference->account_receivable ) {
            $showPage = false;
        }

        return [
            'showPage'   => $showPage,
            'preference' => $preference
        ];
    }
}
