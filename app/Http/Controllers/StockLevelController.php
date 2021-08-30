<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            ['link'=> route('branches-view'), 'name'=>"Stock Level"], 
            ['name'=>"New Stock Level"],
        ];

        return view('stock-level.create', [
            'breadcrumbs' => $breadcrumbs,
            'company'     => $this->getCompany()
        ]);
    }
}
