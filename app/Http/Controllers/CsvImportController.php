<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\FiliereImport; // Import your custom import class
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class CsvImportController extends Controller
{
    /**
     * Handle Excel file import.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function import(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:xlsx,xls|max:10240', // Adjust max file size as needed
        ]);

        // Retrieve the uploaded file
        $file = $request->file('file');

        try {
            // Enable query logging
            \DB::enableQueryLog();

            // Begin a database transaction
            \DB::beginTransaction();

            // Track the number of records imported
            $importedCount = 0;

            // Import Excel data using Laravel Excel
            Excel::import(new FiliereImport, $file);

            // Commit the transaction if all operations are successful
            \DB::commit();

            // Get the executed queries
            $queries = \DB::getQueryLog();

            // Flash success message to the session
            return redirect()->back()->with('success', 'Import successful.');
        } catch (\Exception $e) {
            // Roll back the transaction if an error occurs
            \DB::rollBack();

            // Log the error
            Log::error('Error during Excel import: ' . $e->getMessage());

            // Redirect back with error message
            return redirect()->back()->withErrors(['file' => 'An error occurred during the import process.']);
        }
    }
}
