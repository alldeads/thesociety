<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
    	$breadcrumbs = [
	        ['link'=>"home",'name'=>"Home"], ['name'=>"Index"]
	    ];

	    return view('content.home', ['breadcrumbs' => $breadcrumbs]);
    }
}
