<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class POSController extends Controller
{
    public function index()
    {
        $this->authorize('pos.view');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['name'=> "Branches"],
        ];

        return view('pos.index', [
            'breadcrumbs' => $breadcrumbs,
            'company'     => $this->getCompany()
        ]);
    }
}
