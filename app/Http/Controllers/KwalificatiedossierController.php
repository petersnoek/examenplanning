<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKwalificatiedossierRequest;
use App\Http\Requests\EditKwalificatiedossierRequest;
use App\Kwalificatiedossier;
use Illuminate\Http\Request;

class KwalificatiedossierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kwalificatiedossiers = Kwalificatiedossier::all();
        return view('kwalificatiedossier.index', compact('kwalificatiedossiers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kwalificatiedossier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateKwalificatiedossierRequest $form)
    {
        $form->persist();
        session()->flash('message', 'Kwalificatiedossier succesvol aangemaakt.');
        return redirect("/kwalificatiedossiers");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kwalificatiedossier  $kwalificatiedossier
     * @return \Illuminate\Http\Response
     */
    public function show(Kwalificatiedossier $kwalificatiedossier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kwalificatiedossier  $kwalificatiedossier
     * @return \Illuminate\Http\Response
     */
    public function edit(Kwalificatiedossier $kwalificatiedossier)
    {
        return view('kwalificatiedossier.edit', compact('kwalificatiedossier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kwalificatiedossier  $kwalificatiedossier
     * @return \Illuminate\Http\Response
     */
    public function update(EditKwalificatiedossierRequest $form, Kwalificatiedossier $kwalificatiedossier)
    {
        $form->patch($kwalificatiedossier);
        session()->flash('message', 'Kwalificatiedossier succesvol aangepast.');
        return redirect("/kwalificatiedossiers");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kwalificatiedossier  $kwalificatiedossier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kwalificatiedossier $kwalificatiedossier)
    {
        Kwalificatiedossier::destroy($kwalificatiedossier->id);
        session()->flash('message', 'Kwalificatiedossier succesvol verwijderd.');
        return redirect("/kwalificatiedossiers");
    }
}
