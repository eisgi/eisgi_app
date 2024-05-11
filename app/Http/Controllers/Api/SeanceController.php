<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Seance;
use Illuminate\Http\Request;

class SeanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all Seances
        $seances = Seance::all();

        // Return a JSON response with all Seances
        return response()->json($seances, 200);
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

        // Create a new Seance instance
        $seance = Seance::create($request->all());

        // Return a JSON response with the newly created Seance
        return response()->json($seance, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Seance $seance)
    {
        // Return a JSON response with the specified Seance
        return response()->json($seance, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seance $seance)
    {
        // Validate the incoming request
        $request->validate([
            // Define your validation rules here based on your requirements
        ]);

        // Update the Seance instance
        $seance->update($request->all());

        // Return a JSON response with the updated Seance
        return response()->json($seance, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seance $seance)
    {
        // Delete the specified Seance
        $seance->delete();

        // Return a JSON response indicating success
        return response()->json(['message' => 'Seance deleted successfully'], 200);
    }
}
