<?php

namespace App\Http\Controllers;

use App\Exam;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($davinci_id = null)
    {
        if(isset($davinci_id))
        {
//            $selectedUser = User::where('davinci_id', $davinci_id)->get();
//            if($selectedUser->count())
//            {
//                $loggedInUser = $selectedUser->first();
//            }
//            else{
//                session()->flash('error', 'Er bestaat geen gebruiker met het opgegeven OVnummer');
//            }
//            $loggedInUser = $davinci_id;
            $selectedUser = User::where('davinci_id', $davinci_id)->get();
            $loggedInUser = $selectedUser->first();
        }
        else{
            $loggedInUser = Auth::user();
        }
        $exams = $loggedInUser->exams;
        //add statusses
        $allExams = Exam::with('proevevanbekwaamheids', 'slots', 'remarks', 'users')->get();
        return view('calendar.show', compact('exams', 'loggedInUser', 'allExams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function requestAgenda()
    {
        return redirect('/agenda/' . request('ovnummer'));
    }
}
