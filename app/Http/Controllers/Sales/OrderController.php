<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\SalesOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('sale.view');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['name'=> "Orders"],
        ];

        return view('sale.index', [
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
        $this->authorize('sale.create');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['link'=> route('orders.index'), 'name'=>"Orders"], 
            ['name'=>"New Order"],
        ];

        return view('sale.create', [
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
        $this->authorize('sale.read');

        $sales = SalesOrder::findOrFail($id);

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['link'=> route('orders.index'), 'name'=>"Sales Order"],
            ['name'=> $sales->reference],
        ];

        if ($sales->company_id == $this->getCompany()->id) {
            return view('sale.read', [
                'breadcrumbs' => $breadcrumbs,
                'company'     => $this->getCompany(),
                'sales'       => $sales
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
        $this->authorize('sale.update');

        $sales = SalesOrder::findOrFail($id);

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['link'=> route('orders.index'), 'name'=>"Orders"],
            ['name'=> $sales->reference],
        ];

        if ($sales->company_id == $this->getCompany()->id) {
            return view('sale.edit', [
                'breadcrumbs' => $breadcrumbs,
                'company'     => $this->getCompany(),
                'sales'       => $sales
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
        $this->authorize('sale.export');

        return $this->exportModule($request->all(), 'SalesOrderExport', $this->getCompany()->id);
    }
}
