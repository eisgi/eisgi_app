<?php

namespace App\Http\Controllers\Admin\GestionAffectation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AffectationFormodgr;
use App\Models\Formateur;
use App\Models\Module;
use App\Models\OptionFiliere;
use App\Models\GroupePhysique;
use PhpOffice\PhpSpreadsheet\IOFactory;

class AffectationFormodgrImportController extends Controller
{
    public function showForm()
    {
        return view('admin.affectation.affectationformodgrimportform');
    }

    public function import(Request $request)
{
    $request->validate([
        'file' => 'required|file',
    ]);

    $file = $request->file('file');

    $extension = $file->getClientOriginalExtension();

    $allowedExtensions = ['xlsx', 'xls', 'csv'];

    if (!in_array($extension, $allowedExtensions)) {
        return redirect()->back()->with('error', 'Format de fichier non pris en charge. Les formats autorisés sont xlsx, xls et csv.');
    }

    try {
        $spreadsheet = IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet();
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        for ($row = 2; $row <= $highestRow; $row++) {
            $rowData = [];
            for ($col = 'A'; $col <= $highestColumn; $col++) {
                $rowData[] = $sheet->getCell($col . $row)->getValue();
            }

            $formateur = Formateur::where('nom', $rowData[5])
                                  ->where('prenom', $rowData[6])
                                  ->first();

            if (!$formateur) {
                throw new \Exception('Formateur non trouvé pour la ligne ' . $row);
            }

            $optionFiliere = OptionFiliere::where('codeOptionFiliere', $rowData[3])
                                            ->where('annee', $rowData[4])
                                            ->first();




            if (!$optionFiliere) {
                dd( $optionFiliere);
                throw new \Exception('Option filière non trouvée pour la ligne ' . $row);
            }

            $module = Module::where('libelleModule', $rowData[2])
                            ->where('option_filieres_id', $optionFiliere->id)
                            ->first();

            if (!$module) {
                throw new \Exception('Module non trouvé pour la ligne ' . $row);
            }

            $groupePhysique = GroupePhysique::where('codeGroupePhysique', $rowData[1])->first();

            if (!$groupePhysique) {
                throw new \Exception('Groupe physique non trouvé pour la ligne ' . $row);
            }

            AffectationFormodgr::create([
                'semaineAnneeFormation' => $rowData[0],
                'matricule' => $formateur->matricule,
                'idModule' => $module->id,
                'idGroupePhysique' => $groupePhysique->id,

            ]);
        }

        return redirect()->back()->with('success', 'Importation des affectations pour le module terminée avec succès !');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Une erreur s\'est produite lors de l\'importation des affectations : ' . $e->getMessage());
    }
}

}
