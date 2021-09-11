<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SalesOrder;
use App\Exports\SalesOrderExport;

class SalesOrderController extends Controller
{
    public function index()
    {
        $this->authorize('sale.view');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['name'=> "Sales Order"],
        ];

        return view('sale.index', [
            'breadcrumbs' => $breadcrumbs,
            'company'     => $this->getCompany()
        ]);
    }

    public function create()
    {
        $this->authorize('sale.create');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['link'=> route('sales-view'), 'name'=>"Sales Order"], 
            ['name'=>"New Sales"],
        ];

        return view('sale.create', [
            'breadcrumbs' => $breadcrumbs,
            'company'     => $this->getCompany()
        ]);
    }

    public function edit(SalesOrder $sales)
    {
        $this->authorize('sale.update');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['link'=> route('sales-view'), 'name'=>"Sales Order"],
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

    public function read(SalesOrder $sales)
    {
        $this->authorize('sale.read');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['link'=> route('sales-view'), 'name'=>"Sales Order"],
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

    public function export(Request $request)
    {
        $this->authorize('sale.export');

        $types = ['csv', 'pdf', 'xlsx', 'xls'];

        $requested_type = isset($request['type']) ? strtolower($request['type']) : 'csv';
        $q = $request['q'];
        $from = $request['from'];
        $to = $request['to'];

        if ( !in_array($requested_type, $types) ) {
            $requested_type = 'csv';
        }

        return (new SalesOrderExport($q, $this->getCompany()->id, $from, $to))->download('sales-order-' . now()->format('Y-m-d') . '.' . $requested_type);
    }
}
