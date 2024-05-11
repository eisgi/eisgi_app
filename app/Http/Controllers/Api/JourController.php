<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Jour;
use Illuminate\Http\Request;

class JourController extends Controller
{
    public function getJourByIdSemaine($id){
        $jours = Jour::where('id_Semaine', $id)->get();
        return response()->json($jours, 200);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all Jours
        $jours = Jour::all();

        // Return a JSON response with all Jours
        return response()->json($jours, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            // Define your validation rules here based on your requirements
        ]);

        // Create a new Jour instance
        $jour = Jour::create($request->all());

        // Return a JSON response with the newly created Jour
        return response()->json($jour, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Jour $jour)
    {
        // Return a JSON response with the specified Jour
        return response()->json($jour, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jour $jour)
    {
        // Validate the incoming request
        $request->validate([
            // Define your validation rules here based on your requirements
        ]);

        // Update the Jour instance
        $jour->update($request->all());

        // Return a JSON response with the updated Jour
        return response()->json($jour, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jour $jour)
    {
        // Delete the specified Jour
        $jour->delete();

        // Return a JSON response indicating success
        return response()->json(['message' => 'Jour deleted successfully'], 200);
    }
}
