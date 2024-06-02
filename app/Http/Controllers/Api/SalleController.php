<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Salle;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all Salles
        $salles = Salle::all();

        // Return a JSON response with all Salles
        return response()->json( $salles, 200);
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

        // Create a new Salle instance
        $salle = Salle::create($request->all());

        // Return a JSON response with the newly created Salle
        return response()->json($salle, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Salle $salle)
    {
        // Return a JSON response with the specified Salle
        return response()->json($salle, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Salle $salle)
    {
        // Validate the incoming request
        $request->validate([
            // Define your validation rules here based on your requirements
        ]);

        // Update the Salle instance
        $salle->update($request->all());

        // Return a JSON response with the updated Salle
        return response()->json($salle, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salle $salle)
    {
        // Delete the specified Salle
        $salle->delete();

        // Return a JSON response indicating success
        return response()->json(['message' => 'Salle deleted successfully'], 200);
    }
}
