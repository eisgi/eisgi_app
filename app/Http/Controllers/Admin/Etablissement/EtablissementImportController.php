<?php

namespace App\Http\Controllers\Admin\Etablissement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Etablissement;
use App\Models\Complexe;
use PhpOffice\PhpSpreadsheet\IOFactory;

class EtablissementImportController extends Controller
{
    
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

            // Recherche de l'ID du complexe en fonction du nom
            $complexe = Complexe::where('nomComplexe', $rowData[2])->first();

            // Vérification si le complexe existe
            if ($complexe) {
                // Créer une nouvelle instance d'Etablissement et la sauvegarder dans la base de données
                Etablissement::create([
                    'NomEtablissement' => $rowData[0], // Supposant que la première colonne contient le NomEtablissement
                    'Adresse' => $rowData[1], // Supposant que la deuxième colonne contient l'Adresse
                    'idComplexe' => $complexe->id, // Utiliser l'ID du complexe trouvé
                ]);
            } else {
                // Gérer le cas où le complexe n'est pas trouvé
                return redirect()->back()->with('error', 'Le complexe avec le nom ' . $rowData[2] . ' n\'a pas été trouvé.');
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
