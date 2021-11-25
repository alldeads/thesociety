<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use App\Models\CashFlow;
use Illuminate\Http\Request;

class CashFlowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('cashflow.view');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['name'=>"Cash Flow"],
        ];

        return view('cash-flow.index', [
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
        $this->authorize('cashflow.create');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['link'=> route('cash-flow.index'), 'name'=>"Cash Flow"], 
            ['name'=>"New Entry"],
        ];

        return view('cash-flow.create', [
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
        $this->authorize('cashflow.read');

        $cashflow = CashFlow::findOrFail($id);

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['link'=> route('cash-flow.index'), 'name'=>"Cash Flow"], 
            ['name'=>"View Entry"],
        ];

        if ($this->getCompany()->id == $cashflow->company_id) {
            return view('cash-flow.read', [
                'breadcrumbs' => $breadcrumbs,
                'cashflow'    => $cashflow
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
        $this->authorize('cashflow.update');

        $cashflow = CashFlow::findOrFail($id);

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['link'=> route('cash-flow.index'), 'name'=>"Cash Flow"], 
            ['name'=>"Edit Entry"],
        ];

        if ($this->getCompany()->id == $cashflow->company_id) {
            return view('cash-flow.edit', [
                'breadcrumbs' => $breadcrumbs,
                'cashflow'    => $cashflow
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
        $this->authorize('cashflow.export');

        return $this->exportModule($request->all(), 'CashFlowExport', $this->getCompany()->id);
    }
}
