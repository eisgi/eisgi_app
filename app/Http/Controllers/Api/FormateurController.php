<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Formateur;
use Illuminate\Http\Request;

class FormateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all formateurs
        $formateurs = Formateur::all();

        // Return a JSON response with all formateurs
        return response()->json( $formateurs, 200);
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

        // Create a new formateur instance
        $formateur = Formateur::create($request->all());

        // Return a JSON response with the newly created formateur
        return response()->json($formateur, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Formateur $formateur)
    {
        // Return a JSON response with the specified formateur
        return response()->json($formateur, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Formateur $formateur)
    {
        // Validate the incoming request
        $request->validate([
            // Define your validation rules here based on your requirements
        ]);

        // Update the formateur instance
        $formateur->update($request->all());

        // Return a JSON response with the updated formateur
        return response()->json( $formateur, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formateur $formateur)
    {
        // Delete the specified formateur
        $formateur->delete();

        // Return a JSON response indicating success
        return response()->json(['message' => 'Formateur deleted successfully'], 200);
    }
}
