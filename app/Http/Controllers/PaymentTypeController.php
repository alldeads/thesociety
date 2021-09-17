<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentTypeController extends Controller
{
    public function index()
    {
        $this->authorize('payment_type.view');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['name'=>"Payment Types"],
        ];

        return view('payment-type.index', [
            'breadcrumbs' => $breadcrumbs,
            'company'     => $this->getCompany()
        ]);
    }

    public function create()
    {
        $this->authorize('payment_type.create');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['link'=> route('payment_types-view'), 'name'=>"Payment Types"], 
            ['name'=>"Create Payment Type"],
        ];

        return view('payment-type.create', [
            'breadcrumbs' => $breadcrumbs,
            'company'     => $this->getCompany()
        ]);
    }
}
