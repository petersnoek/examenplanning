<?php

namespace App\Http\Controllers;

use App\Exam;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
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
        $loggedInUser = $this->setUser($davinci_id);
        if($loggedInUser->role_id == 3){
            $exams = $loggedInUser->exams;

        }
        else{
            $slots = $loggedInUser->slots;
            $exams = collect();
            foreach($slots as $slot)
            {
                foreach($slot->exams as $exam)
                {
                    $exams->push($exam);
                }
//                dd($exams);
            }
        }
        //add statusses
        $allExams = Exam::with('proevevanbekwaamheids', 'slot', 'remarks')->get();
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
        return redirect('/agenda/' . request('ovnummer') . '/show');
    }
    public function requestAgendaTable($davinci_id = null){
        $loggedInUser = $this->setUser($davinci_id);

        if($loggedInUser->role_id == 3){
            $allExams = $loggedInUser->exams;
        }
        else{
            $slots = $loggedInUser->slots;
            $allExams = collect();
            foreach($slots as $slot)
            {
                foreach($slot->exams as $exam)
                {
                    $allExams->push($exam);
                }
            }
        }

        return view('calendar.all', compact( 'loggedInUser', 'allExams'));
    }

    public function all(){
        $allExams = Exam::with('proevevanbekwaamheids', 'slot', 'remarks')->get();
        return view('calendar.all', compact('allExams'));
    }

    public function setUser($davinci_id){
        if(isset($davinci_id))
        {
            $selectedUser = User::where('davinci_id', $davinci_id)->get();
            return $selectedUser->first();
        }
        else{
            return Auth::user();
        }
    }
}
