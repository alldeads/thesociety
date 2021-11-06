<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use App\Models\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('tax.view');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['name'=>"Tax"],
        ];

        return view('tax.index', [
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
        $this->authorize('tax.create');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"],
            ['link'=> route('tax.index'), 'name'=>"Tax"],
            ['name'=>"New Tax"],
        ];

        return view('tax.create', [
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
        $this->authorize('tax.create');

        $tax = Tax::findOrFail($id);

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"],
            ['link'=> route('tax.index'), 'name'=>"Tax"],
            ['name'=> $tax->name],
        ];

        if ($this->getCompany()->id == $tax->company_id) {
            return view('tax.read', [
                'breadcrumbs' => $breadcrumbs,
                'tax'         => $tax
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
        $this->authorize('tax.create');

        $tax = Tax::findOrFail($id);

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"],
            ['link'=> route('tax.index'), 'name'=>"Tax"],
            ['name'=> $tax->name],
        ];

        if ($this->getCompany()->id == $tax->company_id) {
            return view('tax.edit', [
                'breadcrumbs' => $breadcrumbs,
                'tax'         => $tax
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
        $this->authorize('tax.export');

        return $this->exportModule($request->all(), 'TaxExport', $this->getCompany()->id);
    }
}
