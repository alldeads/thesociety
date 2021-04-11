<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartOfAccountController extends Controller
{
    public function index()
    {
    	return view('accounting.chart_account');
    }
}
