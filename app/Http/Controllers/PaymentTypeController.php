<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PaymentType;

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

    public function edit(PaymentType $payment)
    {
        $this->authorize('payment_type.update');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['link'=> route('payment_types-view'), 'name'=>"Payment Types"],
            ['name'=> ucwords($payment->name)],
        ];

        if ($payment->company_id == $this->getCompany()->id) {
            return view('payment-type.edit', [
                'breadcrumbs' => $breadcrumbs,
                'company'     => $this->getCompany(),
                'payment'     => $payment
            ]);
        }

        return view('errors.403');
    }
}
