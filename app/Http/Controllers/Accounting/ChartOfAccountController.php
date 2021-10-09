<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use App\Exports\ChartAccountExport;
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function export(Request $request)
    {
        $this->authorize('chart.export');

        $types = ['csv', 'pdf', 'xlsx', 'xls', 'ods'];

        $requested_type = isset($request['type']) ? strtolower($request['type']) : 'csv';
        $q = $request['q'];

        if ( !in_array($requested_type, $types) ) {
            $requested_type = 'csv';
        }

        return (new ChartAccountExport($q, $this->getCompany()->id))->download('chart-of-accounts-' . now()->format('Y-m-d') . '.' . $requested_type);
    }
}
