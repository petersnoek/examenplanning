<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CreateCompanyRequest;
use App\Http\Requests\EditCompanyRequest;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCompanyRequest $form)
    {
        $form->persist();
        session()->flash('message', 'Bedrijf succesvol aangemaakt.');
        return redirect("/companies");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function update(EditCompanyRequest $form, Company $company)
    {
        $form->patch($company);
        session()->flash('message', 'Bedrijf succesvol aangepast.');
        return redirect("/companies");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        Company::destroy($company->id);
        session()->flash('message', 'Bedrijf succesvol verwijderd.');
        return redirect("/companies");
    }

    public function getAll()
    {
        return response()->json(array('msg'=> Company::all()),200);
    }
}
