<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryHistoryController extends Controller
{
    public function index()
    {
        $this->authorize('history.view');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['name'=> "Histories"],
        ];

        return view('history.index', [
            'breadcrumbs' => $breadcrumbs,
            'company'     => $this->getCompany()
        ]);
    }
}
