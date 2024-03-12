<?php

namespace App\Http\Controllers;

use App\Models\Semaine;
use Illuminate\Http\Request;

class SemaineController extends Controller
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
    
    public function create(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'codeSemaine' => 'required',
        'dateDebutSemaine' => 'required|date',
        'dateFinSemaine' => 'required|date',
        'anneeformation' => 'required|integer'
    ]);

    // Create a new Semaine record with the validated data
    $semaine = Semaine::create($validatedData);

    // Redirect the user to a specific route
    return redirect()->route('route_name'); 
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

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
     * @param  \App\Models\Semaine  $semaine
     * @return \Illuminate\Http\Response
     */
    public function show(Semaine $semaine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Semaine  $semaine
     * @return \Illuminate\Http\Response
     */
    public function edit(Semaine $semaine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Semaine  $semaine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Semaine $semaine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Semaine  $semaine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Semaine $semaine)
    {
        //
    }
}