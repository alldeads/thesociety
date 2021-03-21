<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Company;

class CompanyController extends Controller
{
    public function details()
    {
    	$response = Gate::inspect('view');

		if ( $response->allowed() ) {
		    return view('company.details');
		} else {
		    return view('misc.not-authorized');
		}
    }
}
