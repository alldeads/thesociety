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

	    $company = Company::getCompanyDetails();

		return view('company.details', [
	    	'breadcrumbs' => $breadcrumbs,
	    	'company'     => $company
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

	    $company = Company::getCompanyDetails();

		return view('company.edit', [
	    	'breadcrumbs' => $breadcrumbs,
	    	'company'     => $company
	    ]);
    }
}
