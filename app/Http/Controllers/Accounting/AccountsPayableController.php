<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Preference;
use App\Models\AccountsPayable;

class AccountsPayableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('accounts_payable.view');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['name'=>"Accounts Payable"],
        ];

        return view('accounts-payable.index', [
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
        $this->authorize('accounts_payable.create');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['link'=> route('accounts-payable.index'), 'name'=>"Accounts Payable"], 
            ['name'=>"New Accounts Payable"],
        ];

        return view('accounts-payable.create', [
            'breadcrumbs' => $breadcrumbs,
            'company'     => $this->getCompany(),
            'showPage'    => $this->showPage()
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
        $this->authorize('accounts_payable.update');

        $payable = AccountsPayable::findOrFail($id);

        $breadcrumbs = [
            ['link' => route('home'), 'name'=>"Dashboard"], 
            ['link' => route('accounts-payable.index'), 'name' => "Accounts Payable"],
            ['name' => "Edit Accounts Payable"],
        ];

        if ($this->getCompany()->id == $payable->company_id) {
            return view('accounts-payable.edit', [
                'breadcrumbs' => $breadcrumbs,
                'payable'     => $payable,
                'showPage'    => $this->showPage()
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
        $this->authorize('accounts_payable.export');

        return $this->exportModule($request->all(), 'AccountsPayableExport', $this->getCompany()->id);
    }

    private function showPage()
    {
        $showPage = true;

        $preference = Preference::perCompany()->first();

        if ( !$preference || !$preference->account_payable ) {
            $showPage = false;
        }

        return [
            'showPage'   => $showPage,
            'preference' => $preference
        ];
    }
}
