<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockLevel;

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
}
