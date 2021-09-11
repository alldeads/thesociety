<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\CovidExport;

class CovidController extends Controller
{
    public function index()
    {
        $this->authorize('covid.view');

        $breadcrumbs = [
            ['link' => route('home'), 'name'=>"Dashboard"], 
            ['name' =>"Contact Tracing"],
        ];

        return view('covid.index', [
            'breadcrumbs' => $breadcrumbs,
            'company'     => $this->getCompany()
        ]);
    }

    public function export(Request $request)
    {
        $this->authorize('covid.export');

        $types = ['csv', 'pdf', 'xlsx', 'xls'];

        $requested_type = isset($request['type']) ? strtolower($request['type']) : 'csv';
        $q = $request['q'];
        $from = $request['from'];
        $to = $request['to'];

        if ( !in_array($requested_type, $types) ) {
            $requested_type = 'csv';
        }

        return (new CovidExport($q, $this->getCompany()->id, $from, $to))->download('contact-tracing-' . now()->format('Y-m-d') . '.' . $requested_type);
    }
}
