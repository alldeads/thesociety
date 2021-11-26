<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Covid;

class CovidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('covid.create');

        $breadcrumbs = [
            ['link' => route('home'), 'name'=>"Dashboard"],
            ['link' => route('covid.index'), 'name'=>"Contact Tracing"], 
            ['name' => "New Record"],
        ];

        return view('covid.create', [
            'breadcrumbs' => $breadcrumbs,
            'company'     => $this->getCompany()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('covid.read');

        $covid = Covid::findOrFail($id);

        $breadcrumbs = [
            ['link' => route('home'), 'name'=>"Dashboard"], 
            ['link' => route('covid.index'), 'name'=>"Contact Tracing"], 
            ['name' => ucwords($covid->name)],
        ];

        if ($this->getCompany()->id == $covid->company_id) {
            return view('covid.read', [
                'breadcrumbs' => $breadcrumbs,
                'covid'       => $covid
            ]);
        }

        return view('errors.403');
    }

    public function export(Request $request)
    {
        $this->authorize('covid.export');

        return $this->exportModule($request->all(), 'CovidExport', $this->getCompany()->id);
    }
}
