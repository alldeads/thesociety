<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\Company;
use App\Models\Branch;

class BranchController extends Controller
{
    public function index()
    {
        $response = Gate::inspect('branch.view');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['name'=> "Branches"],
        ];

        $company = Company::getCompanyDetails();

        if ( $response->allowed() ) {
            return view('branch.index', [
                'breadcrumbs' => $breadcrumbs,
                'company'     => $company
            ]);
        } else {
            return view('misc.not-authorized');
        }
    }

    public function create()
    {
        $response = Gate::inspect('branch.create');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['link'=> route('branches-view'), 'name'=>"Branch"], 
            ['name'=>"New Branch"],
        ];

        $company = Company::getCompanyDetails();

        if ( $response->allowed() ) {
            return view('branch.create', [
                'breadcrumbs' => $breadcrumbs,
                'company'     => $company
            ]);
        } else {
            return view('misc.not-authorized');
        }
    }

    public function edit(Branch $branch)
    {
        $response = Gate::inspect('branch.update');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['link'=> route('branches-view'), 'name'=>"Branch"], 
            ['name'=>"Edit Branch"],
        ];

        $company = Company::getCompanyDetails();

        if ( $response->allowed() && ($company->id == $branch->company_id) ) {
            return view('branch.edit', [
                'breadcrumbs' => $breadcrumbs,
                'branch'      => $branch
            ]);
        } else {
            return view('misc.not-authorized');
        }
    }

    public function view(Branch $branch)
    {
        $response = Gate::inspect('branch.read');

        $breadcrumbs = [
            ['link'=> route('home'), 'name'=>"Dashboard"], 
            ['link'=> route('branches-view'), 'name'=>"Branch"], 
            ['name'=> $branch->name],
        ];

        $company = Company::getCompanyDetails();

        if ( $response->allowed() && ($company->id == $branch->company_id) ) {
            return view('branch.read', [
                'breadcrumbs' => $breadcrumbs,
                'branch'      => $branch
            ]);
        } else {
            return view('misc.not-authorized');
        }
    }
}
