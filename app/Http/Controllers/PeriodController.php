<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePeriodForm;
use App\Http\Requests\EditPeriodForm;
use App\period;
use App\Schoolyear;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\DataTables;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periods = Period::all();
        return view('periods.index', compact('periods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $periods = Period::all();
        $schoolyears = Schoolyear::all();
        return view('periods.create', compact('periods', 'schoolyears'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePeriodForm $form)
    {
        $form->persist();
        session()->flash('message', 'Periode succesvol aangemaakt.');
        return redirect("/periods/");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\period $period
     * @return \Illuminate\Http\Response
     */
    public function show(period $period)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\period $period
     * @return \Illuminate\Http\Response
     */
    public function edit(period $period)
    {
        $now = Carbon::now();
        $schoolyears = Schoolyear::all();
        return view('periods.edit', compact('period', 'now', 'schoolyears'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\period $period
     * @return \Illuminate\Http\Response
     */
    public function update(EditPeriodForm $form, period $period)
    {
        $form->patch($period, $period->schoolyear);
        session()->flash('message', 'Periode succesvol aangepast.');
        return redirect("/periods");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\period $period
     * @return \Illuminate\Http\Response
     */
    public function destroy(period $period)
    {
        Period::destroy($period->id);
        session()->flash('message', 'Periode succesvol verwijderd.');
        return redirect("/periods");
    }
}
