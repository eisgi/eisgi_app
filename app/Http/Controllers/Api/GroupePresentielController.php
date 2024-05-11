<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GroupePresentiel;
use Illuminate\Http\Request;

class GroupePresentielController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all GroupePresentiels
        $groupePresentiels = GroupePresentiel::all();

        // Return a JSON response with all GroupePresentiels
        return response()->json($groupePresentiels, 200);
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

        // Create a new GroupePresentiel instance
        $groupePresentiel = GroupePresentiel::create($request->all());

        // Return a JSON response with the newly created GroupePresentiel
        return response()->json($groupePresentiel, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(GroupePresentiel $groupePresentiel)
    {
        // Return a JSON response with the specified GroupePresentiel
        return response()->json($groupePresentiel, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GroupePresentiel $groupePresentiel)
    {
        // Validate the incoming request
        $request->validate([
            // Define your validation rules here based on your requirements
        ]);

        // Update the GroupePresentiel instance
        $groupePresentiel->update($request->all());

        // Return a JSON response with the updated GroupePresentiel
        return response()->json($groupePresentiel, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GroupePresentiel $groupePresentiel)
    {
        // Delete the specified GroupePresentiel
        $groupePresentiel->delete();

        // Return a JSON response indicating success
        return response()->json(['message' => 'GroupePresentiel deleted successfully'], 200);
    }
}
