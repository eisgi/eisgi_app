<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AnneeFormation;
use Illuminate\Http\Request;

class AnneeFormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all AnneeFormations
        $anneeFormations = AnneeFormation::all();

        // Return a JSON response with all AnneeFormations
        return response()->json($anneeFormations, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'anneeFormation' => 'required|string|max:255',
            'dateDebutAnneeFormation' => 'required|date',
            'dateFinAnneeFormation' => 'required|date|after:dateDebutAnneeFormation',
        ]);

        // Create a new AnneeFormation instance
        $anneeFormation = AnneeFormation::create($request->all());

        // Return a JSON response with the newly created AnneeFormation
        return response()->json($anneeFormation, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(AnneeFormation $anneeFormation)
    {
        // Return a JSON response with the specified AnneeFormation
        return response()->json($anneeFormation, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AnneeFormation $anneeFormation)
    {
        // Validate the incoming request
        $request->validate([
            'anneeFormation' => 'required|string|max:255',
            'dateDebutAnneeFormation' => 'required|date',
            'dateFinAnneeFormation' => 'required|date|after:dateDebutAnneeFormation',
        ]);

        // Update the AnneeFormation instance
        $anneeFormation->update($request->all());

        // Return a JSON response with the updated AnneeFormation
        return response()->json($anneeFormation, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnneeFormation $anneeFormation)
    {
        // Delete the specified AnneeFormation
        $anneeFormation->delete();

        // Return a JSON response indicating success
        return response()->json(['message' => 'AnneeFormation deleted successfully'], 200);
    }
}
