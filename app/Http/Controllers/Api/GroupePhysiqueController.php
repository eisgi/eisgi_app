<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GroupePhysique;
use Illuminate\Http\Request;

class GroupePhysiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all GroupePhysiques
        $groupePhysiques = GroupePhysique::all();

        // Return a JSON response with all GroupePhysiques
        return response()->json($groupePhysiques, 200);
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

        // Create a new GroupePhysique instance
        $groupePhysique = GroupePhysique::create($request->all());

        // Return a JSON response with the newly created GroupePhysique
        return response()->json($groupePhysique, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(GroupePhysique $groupePhysique)
    {
        // Return a JSON response with the specified GroupePhysique
        return response()->json($groupePhysique, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GroupePhysique $groupePhysique)
    {
        // Validate the incoming request
        $request->validate([
            // Define your validation rules here based on your requirements
        ]);

        // Update the GroupePhysique instance
        $groupePhysique->update($request->all());

        // Return a JSON response with the updated GroupePhysique
        return response()->json($groupePhysique, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GroupePhysique $groupePhysique)
    {
        // Delete the specified GroupePhysique
        $groupePhysique->delete();

        // Return a JSON response indicating success
        return response()->json(['message' => 'GroupePhysique deleted successfully'], 200);
    }
}
