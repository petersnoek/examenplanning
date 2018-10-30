<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSchoolyearForm;
use App\Http\Requests\EditSchoolyearForm;
use App\Schoolyear;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SchoolyearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schoolyears = Schoolyear::all();
        return view('schoolyears.index', compact('schoolyears'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schoolyears = Schoolyear::all();
        return view('schoolyears.create', compact('schoolyears'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSchoolyearForm $form)
    {
        if (Carbon::parse(request('einddatum')) < Carbon::parse(request('startdatum'))) {
            return redirect()->back()->withErrors(array('einddatum' => 'Deze einddatum ligt voor de startdatum'));
        } else {
            $form->persist();
            session()->flash('message', 'Schooljaar succesvol aangemaakt.');
            return redirect("/schoolyears/");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Schoolyear $schoolyear
     * @return \Illuminate\Http\Response
     */
    public function show(Schoolyear $schoolyear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Schoolyear $schoolyear
     * @return \Illuminate\Http\Response
     */
    public function edit(Schoolyear $schoolyear)
    {
        return view('schoolyears.edit', compact('schoolyear'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Schoolyear $schoolyear
     * @return \Illuminate\Http\Response
     */
    public function update(EditSchoolyearForm $form, Schoolyear $schoolyear)
    {
        if (Carbon::parse(request('einddatum')) < Carbon::parse(request('startdatum'))) {
            return redirect()->back()->withErrors(array('einddatum' => 'Deze einddatum ligt voor de startdatum'));
        } else {
            $form->patch($schoolyear);
            session()->flash('message', 'Schooljaar succesvol aangepast.');
            return redirect("/schoolyears");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Schoolyear $schoolyear
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schoolyear $schoolyear)
    {
        Schoolyear::destroy($schoolyear->id);
        session()->flash('message', 'Schooljaar succesvol verwijderd.');
        return redirect("/schoolyears");
    }

    public function allSlots(){
        $schoolyears = Schoolyear::all();
        return view('slots.create', compact('schoolyears'));
    }
}
