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
            'company'     => $this->company
        ]);
    }
}
