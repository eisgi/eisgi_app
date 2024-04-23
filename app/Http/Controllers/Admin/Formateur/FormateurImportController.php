<?php

namespace App\Http\Controllers\Admin\Formateur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Formateur;
use App\Models\Etablissement;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Carbon\Carbon;

class FormateurImportController extends Controller
{
    public function showForm()
    {
        return view('admin.formateur.formateurimportform');
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

                //jib lclé 3ad inseriha

                $etablissement=Etablissement::where('NomEtablissement',$rowData[19])->first();

                // Convertir les dates en utilisant strtotime
                $rowData[8] = date('Y-m-d', strtotime($rowData[8]));
                $rowData[9] = date('Y-m-d', strtotime($rowData[9]));
                $rowData[10] = date('Y-m-d', strtotime($rowData[10]));

                // Créer une nouvelle instance de Formateur et la sauvegarder dans la base de données
                Formateur::create([
                    'matricule' => $rowData[0],
                    'password' => $rowData[1],
                    'nom' => $rowData[2],
                    'prenom' => $rowData[3],
                    'numTel' => $rowData[4],
                    'civilite' => $rowData[5],
                    'Echelle' => $rowData[6],
                    'Echelon' => $rowData[7],
                    'Date_Recrutement' => $rowData[8],
                    'Date_Depart_Retrait' => $rowData[9],
                    'dateNaissance' => $rowData[10],
                    'Adresse' => $rowData[11],
                    'Grade' => $rowData[12],
                    'Diplome' => $rowData[13],
                    'situationFamiliale' => $rowData[14],
                    'MasseHoaraireHeb' => $rowData[15],
                    'massHorRealiseeAnnuel' => $rowData[16],
                    'Filiere' => $rowData[17],
                    'Categorie' => $rowData[18],
                    'idEtablissement' => $etablissement->id, // Supposant que la 20ème colonne contient l'id de l'établissement
                ]);
            }

            // Rediriger avec un message de succès
            return redirect()->back()->with('success', 'Importation terminée avec succès !');
        } catch (\Exception $e) {
            // Rediriger avec un message d'erreur si l'importation échoue
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de l\'importation du fichier : ' . $e->getMessage());
        }
    }
}
