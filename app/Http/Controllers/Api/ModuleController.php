<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all Modules
        $modules = Module::all();

        // Return a JSON response with all Modules
        return response()->json($modules, 200);
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

        // Create a new Module instance
        $module = Module::create($request->all());

        // Return a JSON response with the newly created Module
        return response()->json($module, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Module $module)
    {
        // Return a JSON response with the specified Module
        return response()->json($module, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Module $module)
    {
        // Validate the incoming request
        $request->validate([
            // Define your validation rules here based on your requirements
        ]);

        // Update the Module instance
        $module->update($request->all());

        // Return a JSON response with the updated Module
        return response()->json($module, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Module $module)
    {
        // Delete the specified Module
        $module->delete();

        // Return a JSON response indicating success
        return response()->json(['message' => 'Module deleted successfully'], 200);
    }
}
