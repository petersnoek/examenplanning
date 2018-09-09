<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSlotRequest;
use App\period;
use App\Schoolyear;
use App\Slot;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(period $period)
    {
        $schoolyears = Schoolyear::all();
        return view('slots.create', compact('schoolyears', 'period'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSlotRequest $form, period $period)
    {
        $persisted = false;
        if (request('dagen') != null) {
            if (Carbon::parse(request('starttijd')) < Carbon::parse(request('eindtijd'))) {
                if (request('gehele_periode') == "on") {
                    foreach (request('dagen') as $dag) {
                        $checkdate = Carbon::parse($period->startdatum);
                        while ($checkdate <= $period->einddatum) {
                            if ($checkdate->dayOfWeek == $dag) {
                                $form->persist($checkdate, request('starttijd'), request('eindtijd'), $period);
                                $persisted = true;
                            }
                            $checkdate->addDay();
                        }
                    }
                } else {
                    if (Carbon::parse(request('startdatum')) < Carbon::parse(request('einddatum'))) {
                        if (Carbon::parse(request('startdatum')) >= Carbon::parse($period->startdatum) && Carbon::parse(request('einddatum')) <= Carbon::parse($period->einddatum)) {
                            foreach (request('dagen') as $dag) {
                                $checkdate = Carbon::parse(request('startdatum'));
                                while ($checkdate <= Carbon::parse(request('einddatum'))) {
                                    if ($checkdate->dayOfWeek == $dag) {
                                        $form->persist($checkdate, request('starttijd'), request('eindtijd'), $period);
                                        $persisted = false;
                                    }
                                    $checkdate->addDay();
                                }
                            }
                        } else {
                            return redirect()->back()->withErrors(array('datum' => 'De subperiod ligt niet geheel binnen de periode'));
                        }
                    }

                }
            } else {
                return redirect()->back()->withErrors(array('starttijd' => 'De starttijd ligt na of is gelijk aan de eindtijd'));
            }

        } else {
            return redirect()->back()->withErrors(array('dagen' => 'Selecteer ten minste één dag'));
        }
        if ($persisted) {
            session()->flash('message', 'Slot(s) succesvol aangemaakt.');
        } else {
            return redirect()->back()->withErrors(array('dagen' => 'Er bestonden geen geselecteerde dagen in de (sub)periode'));

        }

        return redirect("/slots/" . $period->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slot $slot
     * @return \Illuminate\Http\Response
     */
    public function show(Slot $slot)
    {
        //
    }

    public function showAll(Period $period)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slot $slot
     * @return \Illuminate\Http\Response
     */
    public function edit(Slot $slot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Slot $slot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slot $slot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slot $slot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slot $slot)
    {
        Slot::destroy($slot->id);
        session()->flash('message', 'Slot succesvol verwijderd.');
        return redirect("/slots/" . $slot->period->id);
    }

    public function showAssignables(){
        $schoolyears = Schoolyear::all();
        return view('slots.show_assignable', compact('schoolyears'));
    }

    public function showAssignable(period $period){
        $schoolyears = Schoolyear::all();
        return view('slots.show_assignable', compact('period', 'schoolyears'));
    }

    public function assign(){

    }
}
