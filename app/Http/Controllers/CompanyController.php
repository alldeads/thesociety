<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Company;

class CompanyController extends Controller
{
    public function details()
    {
    	$this->authorize('company.view');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['name'=>"Company Details"],
	    ];

		return view('company.details', [
	    	'breadcrumbs' => $breadcrumbs,
	    	'company'     => $this->getCompany()
	    ]);
    }

    public function edit()
    {
    	$this->authorize('company.update');

    	$breadcrumbs = [
	        ['link'=> route('home'), 'name'=>"Dashboard"], 
	        ['link'=> route('company-details'), 'name'=>"Company"], 
	        ['name'=>"Edit"], 
	    ];

		return view('company.edit', [
	    	'breadcrumbs' => $breadcrumbs,
	    	'company'     => $this->getCompany()
	    ]);
    }
}
