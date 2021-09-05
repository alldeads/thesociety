<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockLevel;
use App\Exports\StockLevelExport;

class StockLevelController extends Controller
{
    public function index()
    {
        $this->authorize('stock_level.view');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['name'=> "Stock Level"],
        ];

        return view('stock-level.index', [
            'breadcrumbs' => $breadcrumbs,
            'company'     => $this->getCompany()
        ]);
    }

    public function create()
    {
        $this->authorize('stock_level.create');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['link'=> route('stock-levels-view'), 'name'=>"Stock Level"], 
            ['name'=>"New Stock Level"],
        ];

        return view('stock-level.create', [
            'breadcrumbs' => $breadcrumbs,
            'company'     => $this->getCompany()
        ]);
    }

    public function edit(StockLevel $stock)
    {
        $this->authorize('stock_level.update');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['link'=> route('stock-levels-view'), 'name'=>"Stock Level"],
            ['name'=> $stock->reference],
        ];

        if ($stock->company_id == $this->getCompany()->id) {
            return view('stock-level.edit', [
                'breadcrumbs' => $breadcrumbs,
                'company'     => $this->getCompany(),
                'stock'       => $stock
            ]);
        }

        return view('errors.403');
    }

    public function view(StockLevel $stock)
    {
        $this->authorize('stock_level.read');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['link'=> route('stock-levels-view'), 'name'=>"Stock Level"],
            ['name'=> $stock->reference],
        ];

        if ($stock->company_id == $this->getCompany()->id) {
            return view('stock-level.read', [
                'breadcrumbs' => $breadcrumbs,
                'company'     => $this->getCompany(),
                'stock'       => $stock
            ]);
        }

        return view('errors.403');
    }

    public function export(Request $request)
    {
        $this->authorize('stock_level.export');

        $types = ['csv', 'pdf', 'xlsx', 'xls', 'ods'];

        $requested_type = isset($request['type']) ? strtolower($request['type']) : 'csv';
        $q = $request['q'];

        // Set default type, if specified type is invalid
        if ( !in_array($requested_type, $types) ) {
            $requested_type = 'csv';
        }

        return (new StockLevelExport($q, $this->getCompany()->id))->download('stock-levels-' . now()->format('Y-m-d') . '.' . $requested_type);
    }
}
