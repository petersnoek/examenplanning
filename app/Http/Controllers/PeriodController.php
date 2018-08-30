<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePeriodForm;
use App\Http\Requests\EditPeriodForm;
use App\period;
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
        return view('periods.select');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $periods = Period::all();
        $now = Carbon::now();
        return view('periods.create', compact('periods', 'now'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePeriodForm $form)
    {
//        dd(Carbon::parse(request('einddatum')), Carbon::parse(request('startdatum')), request('startdatum'));
        try{
            $schooljaar = "01-01-" . explode("-", request('schooljaar'))[0];
            if(Carbon::parse(request('startdatum')) < Carbon::parse($schooljaar))
            {
                return redirect()->back()->withErrors(array('startdatum' => 'Deze startdatum ligt voor het geselecteerde schooljaar'));
            }
            elseif(Carbon::parse(request('einddatum')) < Carbon::parse(request('startdatum')))
            {
                return redirect()->back()->withErrors(array('einddatum' => 'Deze einddatum ligt voor de startdatum'));
            }
            else{
                $form->persist();
                session()->flash('message', 'Periode succesvol aangemaakt.');
                return redirect("/periods/create");
            }
        }
        catch(Exception $e){
            return redirect()->back()->withErrors(array('periodenaam' => 'Deze periodenaam is al in gebruik voor dit schooljaar'));
        }
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
        return view('periods.edit', compact('period', 'now'));
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
        try{
            $schooljaar = "01-01-" . explode("-", request('schooljaar'))[0];
//            dd(Carbon::parse($schooljaar), Carbon::parse($period->startdatum), Carbon::parse($period->startdatum) < Carbon::parse($schooljaar));
            if(Carbon::parse(request('startdatum')) < Carbon::parse($schooljaar))
            {
                return redirect()->back()->withErrors(array('startdatum' => 'Deze startdatum ligt voor het geselecteerde schooljaar'));
            }
            elseif(Carbon::parse(request('einddatum')) < Carbon::parse(request('startdatum')))
            {
                return redirect()->back()->withErrors(array('einddatum' => 'Deze einddatum ligt voor de startdatum'));
            }
            else{
                $form->patch($period);
                session()->flash('message', 'Periode succesvol aangepast.');
                return redirect("/periods/create");
            }
        }catch(Exception $e){
            return redirect()->back()->withErrors(array('periodenaam' => 'Deze periodenaam is al in gebruik voor dit schooljaar'));
        }
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
        return redirect("/periods/create");
    }

    public function anyData(){
        $periods = Period::all();
        return Datatables::of($periods)->make(true);
    }
    public function getIndex()
    {
        return view('periods.select');
    }
}
