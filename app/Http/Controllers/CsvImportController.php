<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\Csv\Reader;
use App\Models\Filiere;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CsvImportController extends Controller
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
   

    // Retrieve the uploaded file
    $file = $request->file('file');

    try {
        // Read the CSV file
        $csv = Reader::createFromPath($file->getPathname(), 'r');
        $csv->setHeaderOffset(0);
        $data = $csv->getRecords();

        // Begin a database transaction
        DB::beginTransaction();

        // Track the number of records imported
        $importedCount = 0;

        // Iterate through each row of the CSV data and insert into database
        foreach ($data as $row) {
            if (isset($row['codeFiliere']) && isset($row['libelleFiliere'])) {
                Filiere::create([
                    'codeFiliere' => $row['codeFiliere'],
                    'libelleFiliere' => $row['libelleFiliere']
                ]);
                $importedCount++;
            }
        }

        // Commit the transaction if all operations are successful
        DB::commit();

        // Flash success message to the session
        return redirect()->back()->with('success', "$importedCount record(s) ont été importé(s) avec succès.");
    } catch (\Exception $e) {
        // Roll back the transaction if an error occurs
        DB::rollBack();

        // Log the error
        Log::error('Error during CSV import: ' . $e->getMessage());

        // Redirect back with error message
        return redirect()->back()->withErrors(['file' => 'Une erreur s\'est produite lors de l\'importation des données.']);
    }
}}