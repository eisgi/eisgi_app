<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Jour;
use App\Models\Semaine;

use Illuminate\Http\Request;

class SemaineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    
    {
        // Retrieve all Semaines
        $semaines = Semaine::all();
        // Return a JSON response with all Semaines
        return response()->json($semaines, 200);
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

        // Create a new Semaine instance
        $semaine = Semaine::create($request->all());

        // Return a JSON response with the newly created Semaine
        return response()->json($semaine, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Semaine $semaine)
    {
        // Return a JSON response with the specified Semaine
        return response()->json($semaine, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Semaine $semaine)
    {
        // Validate the incoming request
        $request->validate([
            // Define your validation rules here based on your requirements
        ]);

        // Update the Semaine instance
        $semaine->update($request->all());

        // Return a JSON response with the updated Semaine
        return response()->json($semaine, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Semaine $semaine)
    {
        // Delete the specified Semaine
        $semaine->delete();

        // Return a JSON response indicating success
        return response()->json(['message' => 'Semaine deleted successfully'], 200);
    }
}
