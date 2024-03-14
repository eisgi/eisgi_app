<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\FormateurImport; // Import your custom import class
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class CsvImportFourmateur extends Controller
{
    /**
     * Handle CSV file import.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function import(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:csv,txt|max:10240', // Adjust max file size and allowed types as needed
        ]);

        // Retrieve the uploaded file
        $file = $request->file('file');

        try {
            // Begin a database transaction
            \DB::beginTransaction();

            // Import CSV data using Laravel Excel
            Excel::import(new FormateurImport, $file);

            // Commit the transaction if all operations are successful
            \DB::commit();

            // Flash success message to the session
            return redirect()->back()->with('success', 'Import successful.');
        } catch (\Exception $e) {
            // Roll back the transaction if an error occurs
            \DB::rollBack();

            // Log the error
            Log::error('Error during CSV import: ' . $e->getMessage());

            // Redirect back with error message
            return redirect()->back()->withErrors(['file' => 'An error occurred during the import process.']);
        }
    }
}