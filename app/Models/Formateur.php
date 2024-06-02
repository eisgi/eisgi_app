<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formateur extends Model
{
    protected $fillable = [
        'matricule',
        'password',
        'nom',
        'prenom',
        'numTel',
        'civilite',
        'Echelle',
        'Echelon',
        'Date_Recrutement',
        'Date_Depart_Retrait',
        'dateNaissance',
        'Adresse',
        'Grade',
        'Diplome',
        'situationFamiliale',
        'MasseHoaraireHeb',
        'massHorRealiseeAnnuel',
        'Filiere',
        'Categorie',
        'idEtablissement',
    ];

    protected $primaryKey = 'matricule';

    public $timestamps = false;

    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class, 'idEtablissement');
    }
}

