<?php

namespace App\Http\Controllers\Admin\Module;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\OptionFiliere;

class ModuleImportController extends Controller
{
    public function showForm()
    {
        return view('admin.module.moduleimportform');
    }

    public function import(Request $request)
    {
        // Valider le fichier téléchargé
        $request->validate([
            'file' => 'required|file',
        ]);

        // Obtenir le fichier de la requête
        $file = $request->file('file');

        // Vérifier l'extension du fichier pour déterminer le format
        $extension = $file->getClientOriginalExtension();

        // Définir les extensions autorisées pour les fichiers Excel
        $allowedExtensions = ['xlsx', 'xls', 'csv'];

        // Vérifier si l'extension est autorisée
        if (!in_array($extension, $allowedExtensions)) {
            return redirect()->back()->with('error', 'Format de fichier non pris en charge. Les formats autorisés sont xlsx, xls et csv.');
        }

        try {
            // Charger la feuille de calcul depuis le fichier téléchargé
            $spreadsheet = IOFactory::load($file);

            // Obtenir la feuille active
            $sheet = $spreadsheet->getActiveSheet();

            // Obtenir les indices de la plus haute ligne et de la plus haute colonne
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();

            // Itérer sur chaque ligne (en commençant par la deuxième ligne, en supposant que la première ligne contienne des en-têtes)
            for ($row = 2; $row <= $highestRow; $row++) {
                // Obtenir les valeurs de cellule pour chaque colonne
                $rowData = [];
                for ($col = 'A'; $col <= $highestColumn; $col++) {
                    $rowData[] = $sheet->getCell($col . $row)->getValue();
                }

                // Recherche de l'option filière basée sur le codeOptionFiliere
                $optionFiliere = OptionFiliere::where('codeOptionFiliere', $rowData[6])
                                            ->where('annee', $rowData[7])
                                            ->first();

                // Vérifier si l'option filière existe
                if ($optionFiliere) {
                    // Créer une nouvelle instance de Module et la sauvegarder dans la base de données
                    Module::create([
                        'codeModule' => $rowData[0],
                        'libelleModule' => $rowData[1],
                        'ordreModule' => $rowData[2],
                        'MHT' => $rowData[3],
                        'Coef' => $rowData[4],
                        'EFM_Regional' => $rowData[5],
                        'option_filieres_id' => $optionFiliere->id, // Utiliser l'ID de l'option filière
                        'semestreModule' => $rowData[8],
                    ]);
                } else {
                    // Si l'option filière n'existe pas, vous pouvez gérer cette situation en conséquence
                }
            }

            // Rediriger avec un message de succès
            return redirect()->back()->with('success', 'Importation terminée avec succès !');
        } catch (\Exception $e) {
            // Rediriger avec un message d'erreur si l'importation échoue
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de l\'importation du fichier : ' . $e->getMessage());
        }
    }
}
