<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use App\Models\CompanyChartAccount;

use Illuminate\Http\Request;

class ChartOfAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('chart.view');

        $breadcrumbs = [
            ['link' => route('home'), 'name'=>"Dashboard"], 
            ['name' =>"Chart of Accounts"],
        ];

        return view('chart-account.index', [
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
        $this->authorize('chart.create');

        $breadcrumbs = [
            ['link' => route('home'), 'name'=>"Dashboard"], 
            ['link' => route('chart-accounts.index'), 'name' => "Chart of Accounts"],
            ['name' => "New Account"],
        ];

        return view('chart-account.create', [
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
        $this->authorize('chart.read');

        $account = CompanyChartAccount::findOrFail($id);

        $breadcrumbs = [
            ['link' => route('home'), 'name'=>"Dashboard"], 
            ['link' => route('chart-accounts.index'), 'name' => "Chart of Accounts"],
            ['name' => ucwords($account->chart_name) . " ($account->code)"],
        ];

        if ($this->getCompany()->id == $account->company_id) {
            return view('chart-account.read', [
                'breadcrumbs' => $breadcrumbs,
                'account'     => $account
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
        $this->authorize('chart.update');

        $account = CompanyChartAccount::findOrFail($id);

        $breadcrumbs = [
            ['link' => route('home'), 'name'=>"Dashboard"], 
            ['link' => route('chart-accounts.index'), 'name' => "Chart of Accounts"],
            ['name' => ucwords($account->chart_name) . " ($account->code)"],
        ];

        if ($this->getCompany()->id == $account->company_id) {
            return view('chart-account.edit', [
                'breadcrumbs' => $breadcrumbs,
                'account'     => $account
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
        $this->authorize('chart.export');

        return $this->exportModule($request->all(), 'ChartAccountExport', $this->getCompany()->id);
    }
}
