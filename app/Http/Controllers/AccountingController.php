<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ChartAccount;

class AccountingController extends Controller
{

    public function chart_accounts()
    {
    	return view('accounting.chart_account');
    }
}
