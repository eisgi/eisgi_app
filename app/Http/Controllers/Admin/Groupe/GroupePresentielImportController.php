<?php

namespace App\Http\Controllers\Admin\Groupe;

use App\Http\Controllers\Controller;
use App\Models\GroupePhysique;
use Illuminate\Http\Request;
use App\Models\OptionFiliere;
use App\Models\GroupePresentiel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class GroupePresentielImportController extends Controller
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
            return response('Le format du fichier doit être .xlsx, .xls ou .csv', 400);
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

                // Vérifier si la valeur de codeGroupePR est vide
                if (!empty($rowData[0])) {
                    // Recherche de l'option filière en fonction du libellé et de l'année
                    $optionFiliere = OptionFiliere::where('libelleOptionFiliere', $rowData[4])
                                                    ->where('annee', $rowData[2])
                                                    ->first();

                    // Si l'option filière n'existe pas, insérer NULL
                    $optionFiliereId = $optionFiliere ? $optionFiliere->id : null;
                    $groupePhysique=GroupePhysique::where('codeGroupePhysique',$rowData[5])
                                                    ->where('annee',$rowData[2])
                                                    ->first();
                    $groupePhysiqueId=$groupePhysique?$groupePhysique->id:null;
                    // Créer une nouvelle instance de GroupePresentiel et la sauvegarder dans la base de données
                    GroupePresentiel::create([
                        'codeGroupePR' => $rowData[0],
                        'option_filieres_id' => $optionFiliereId,
                        'groupe_physique_id'=>$groupePhysiqueId,
                        'libelleGroupePR' => $rowData[1],
                        'annee' => $rowData[2],
                        'typegroupe'=> $rowData[3],
                    ]);
                }
            }

            // Rediriger avec un message de succès
           return response('Le fichier a été importé avec succès', 200);
        } catch (\Exception $e) {
            // Rediriger avec un message d'erreur si l'importation échoue
return response('Le fichier n\'a pas été importé', 400)     ;  
 }
    }
}
