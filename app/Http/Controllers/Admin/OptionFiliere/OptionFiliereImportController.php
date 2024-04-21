<?php

namespace App\Http\Controllers\Admin\OptionFiliere;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OptionFiliere;
use PhpOffice\PhpSpreadsheet\IOFactory;

class OptionFiliereImportController extends Controller
{
    public function showForm()
    {
        return view('admin.optionfiliere.optionfiliereimportform');
    }

    public function import(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|file',
        ]);

        // Get the file from the request
        $file = $request->file('file');

        // Check the file extension to determine the format
        $extension = $file->getClientOriginalExtension();

        // Define the allowed extensions for Excel files
        $allowedExtensions = ['xlsx', 'xls', 'csv'];

        // Check if the extension is allowed
        if (!in_array($extension, $allowedExtensions)) {
            return redirect()->back()->with('error', 'Format de fichier non pris en charge. Les formats autorisés sont xlsx, xls et csv.');
        }

        try {
            // Load the spreadsheet from the uploaded file
            $spreadsheet = IOFactory::load($file);

            // Get the active sheet
            $sheet = $spreadsheet->getActiveSheet();

            // Get the highest row and column indices
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();

            // Iterate through each row (starting from the second row, assuming the first row contains headers)
            for ($row = 2; $row <= $highestRow; $row++) {
                // Get the cell values for each column
                $rowData = [];
                for ($col = 'A'; $col <= $highestColumn; $col++) {
                    $rowData[] = $sheet->getCell($col . $row)->getValue();
                }

                // Create a new OptionFiliere instance and save it to the database
                OptionFiliere::create([
                    'codeOptionFiliere' => $rowData[0], // Assuming the first column contains codeOptionFiliere
                    'libelleOptionFiliere' => $rowData[1], // Assuming the second column contains libelleOptionFiliere
                    'annee' => $rowData[2], // Assuming the third column contains annee
                    'codeFiliere' => $rowData[3], // Assuming the fourth column contains codeFiliere
                ]);
            }

            // Redirect with success message
            return redirect()->back()->with('success', 'Importation terminée avec succès !');
        } catch (\Exception $e) {
            // Redirect with error message if import fails
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de l\'importation du fichier : ' . $e->getMessage());
        }
    }
}
