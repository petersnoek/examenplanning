<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Http\Requests\CreateExamRequest;
use App\Kwalificatiedossier;
use App\Proevevanbekwaamheid;
use App\Schoolyear;
use App\User;
use Illuminate\Http\Request;

class ExamController extends Controller
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
    public function create()
    {
        $students = User::where('role_id','=', '3')->get();
        $kwalificatiedossiers = Kwalificatiedossier::all();
        return view('exams.create', compact('students', 'pvbs', 'kwalificatiedossiers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateExamRequest $form)
    {
        $form->persist();
        session()->flash('message', 'Examen succesvol aangemaakt.');
        return redirect('/exams/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(exam $exam)
    {
        //
    }

    public function getPvbs(Kwalificatiedossier $kwalificatiedossier){
        try{
            $pvbs = $kwalificatiedossier->proevevanbekwaamheids;
            return array(
                'fail' => false,
                'message' => collect(['pvbs' => $pvbs])
            );
        }
        catch(\Exception $e){
            return array(
                'fail' => true,
                'message' => collect([
                    'error' => 'Er zijn geen proeve van bekwaamheids gevonden voor dit kwalificatiedoessier. Vraag een administrator om deze te updaten.',
                    'message' => $e.getMessage(),
                    ])
            );
        }
    }
}
