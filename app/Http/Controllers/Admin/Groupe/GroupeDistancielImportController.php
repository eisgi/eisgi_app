<?php

namespace App\Http\Controllers\Admin\Groupe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OptionFiliere;
use App\Models\GroupeDistanciel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class GroupeDistancielImportController extends Controller
{
    public function showForm()
    {
        return view('admin.groupe.groupedistancielimportform');
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

                // Vérifier si la valeur de codeGroupeDS est vide
                if (!empty($rowData[0])) {
                    // Recherche de l'option filière en fonction du libellé et de l'année
                    $optionFiliere = OptionFiliere::where('libelleOptionFiliere', $rowData[5])
                                                    ->where('annee', $rowData[3])
                                                    ->first();

                    // Si l'option filière n'existe pas, insérer NULL
                    $optionFiliereId = $optionFiliere ? $optionFiliere->id : null;

                    // Créer une nouvelle instance de GroupeDistanciel et la sauvegarder dans la base de données
                    GroupeDistanciel::create([
                        'codeGroupeDS' => $rowData[0],
                        'libelleGroupeDS' => $rowData[1],
                        'nombreGroupeContenus' => $rowData[2],
                        'annee' => $rowData[3],
                        'typegroupe'=> $rowData[4],
                        'option_filieres_id' => $optionFiliereId,
                    ]);
                }
            }


            // Rediriger avec un message de succès
            return redirect()->back()->with('success', 'Importation des groupes distanciels terminée avec succès !');
        } catch (\Exception $e) {
            // Rediriger avec un message d'erreur si l'importation échoue
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de l\'importation des groupes distanciels : ' . $e->getMessage());
        }
    }
}
