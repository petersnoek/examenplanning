<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Http\Requests\CreateSlotRequest;
use App\Http\Requests\PlanSlotRequest;
use App\period;
use App\Schoolyear;
use App\Slot;
use App\User;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $link = '/slots/';
        return view('slots.index', compact('schoolyears', 'link'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Period $period)
    {
        $examinatoren = User::where('role_id', '=', '2')->get();
        return view('slots.create', compact('period', 'examinatoren'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSlotRequest $form, period $period)
    {
        if ($form->persist($period)) {
            session()->flash('message', 'Slot(s) succesvol aangemaakt.');
            return redirect("/slots/" . $period->id);
        } else {
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
        $link = '/slots/';
        return view('slots.index', compact('schoolyears', 'period', 'link'));
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
        $link = '/slots/assignable/show/';
        return view('slots.selection', compact('schoolyears', 'link'));
    }

    public function showAssignable(period $period)
    {
        $startTime = $period->startdatum;
        $endTime = $period->einddatum;
        $calendarweeks = [];
        while ($startTime < $endTime) {
            array_push($calendarweeks, [$startTime->format('Y'), $startTime->weekOfYear]);
            $startTime->addWeeks(1);
        }
        $weekdays = [1, 2, 3, 4, 5]; // monday = 1;
        $slots = $period->slots;
        $date = Carbon::now();

        //fetch all the data to make the modal form possible
        $examinators = User::where('role_id', '=', '2')->get();

        $studenten = User::where('role_id', '=', '3')->get();

//        $examens = Exam::where('slot_id', '=', null)->get();
        $examens = Exam::all();

        $bedrijfsmederwerker = User::where('role_id', '=', '4')->get();

        return view('slots.planning', compact('calendarweeks', 'weekdays', 'slots', 'period', 'date', 'studenten', 'examinators', 'bedrijfsmederwerker', 'examens'));
    }

    public function plan(PlanSlotRequest $form, Slot $slot)
    {
        $form->plan($slot);
        session()->flash('message', 'Slot(s) succesvol gepland/herpland');
        return redirect()->back();
    }

    public static function resetWeek()
    {
        $weekcount++;
        $daycount = 0;
    }
}
