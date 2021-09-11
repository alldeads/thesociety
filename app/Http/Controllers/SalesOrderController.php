<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesOrder;

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
}
