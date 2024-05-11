<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GroupeDistanciel;
use Illuminate\Http\Request;

class GroupeDistancielController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all GroupeDistanciels
        $groupeDistanciels = GroupeDistanciel::all();

        // Return a JSON response with all GroupeDistanciels
        return response()->json($groupeDistanciels, 200);
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

        // Create a new GroupeDistanciel instance
        $groupeDistanciel = GroupeDistanciel::create($request->all());

        // Return a JSON response with the newly created GroupeDistanciel
        return response()->json($groupeDistanciel, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(GroupeDistanciel $groupeDistanciel)
    {
        // Return a JSON response with the specified GroupeDistanciel
        return response()->json($groupeDistanciel, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GroupeDistanciel $groupeDistanciel)
    {
        // Validate the incoming request
        $request->validate([
            // Define your validation rules here based on your requirements
        ]);

        // Update the GroupeDistanciel instance
        $groupeDistanciel->update($request->all());

        // Return a JSON response with the updated GroupeDistanciel
        return response()->json( $groupeDistanciel, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GroupeDistanciel $groupeDistanciel)
    {
        // Delete the specified GroupeDistanciel
        $groupeDistanciel->delete();

        // Return a JSON response indicating success
        return response()->json(['message' => 'GroupeDistanciel deleted successfully'], 200);
    }
}
