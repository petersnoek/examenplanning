<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Http\Requests\CreateExamRequest;
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
        $students = User::all(); // fetch only students
        $pvbs = array((object)array('id'=>'1', 'name'=>'PvB1'),(object)array('id'=>'2', 'name'=>'PvB2'), (object)array('id'=>'3', 'name'=>'PvB3'),(object)array('id'=>'4', 'name'=>'PvB4'));
        $kerntaken = [(object)['id'=>'1', 'name'=>'Ontwerpen', 'identifier' => 'KT1'],(object)['id'=>'2', 'name'=>'Realiseren', 'identifier' => 'KT2'], (object)['id'=>'3', 'name'=>'Opleveren/Implementeren', 'identifier' => 'KT3'],(object)['id'=>'4', 'name'=>'Onderhoud', 'identifier' => 'KT4']];
        return view('exams.create', compact('students', 'pvbs', 'kerntaken'));
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
}
