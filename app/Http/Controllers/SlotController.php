<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSlotRequest;
use App\period;
use App\Schoolyear;
use App\Slot;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
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
        $schoolyears = Schoolyear::all();
        return view('slots.index', compact('schoolyears'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Period $period)
    {
        return view('slots.create', compact('period'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSlotRequest $form, period $period)
    {
        if($form->persist($period)){
            session()->flash('message', 'Slot(s) succesvol aangemaakt.');
            return redirect("/slots/" . $period->id);
        }
        else{
            return redirect()->back()->withErrors(array('dagen' => 'Er bestonden geen geselecteerde dagen in de (sub)periode'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slot $slot
     * @return \Illuminate\Http\Response
     */
    public function show(period $period)
    {
        $schoolyears = Schoolyear::all();
        return view('slots.index', compact('schoolyears', 'period'));
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

    public function showAssignables()
    {
        $schoolyears = Schoolyear::all();
        return view('slots.show_assignable', compact('schoolyears'));
    }

    public function showAssignable(period $period)
    {
        $schoolyears = Schoolyear::all();
        // calculate all weeks between period startdate and enddate
        $startTime = $period->startdatum;
        $endTime = $period->einddatum;
        $calendarweeks = [];
        while ($startTime < $endTime) {
            array_push($calendarweeks, [$startTime->format('Y'), $startTime->weekOfYear]);
            $startTime->addWeeks(1);
        }
        $weekdays = [1,2,3,4,5]; // monday = 1;
        $slots = $period->slots;
        $date = Carbon::now();
        return view('slots.show_assignable', compact('calendarweeks', 'weekdays', 'slots', 'period', 'schoolyears', 'date'));
    }

    public function assign()
    {

    }

    public static function resetWeek()
    {
        $weekcount++;
        $daycount = 0;
    }
}
