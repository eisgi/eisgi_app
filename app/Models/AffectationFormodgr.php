<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Formateur;


class AffectationFormodgr extends Model
{
    protected $table = 'affectations_FORMODGR';

    protected $primaryKey = 'id';
    public $timestamps=false;
    protected $fillable = [
        'semaineAnneeFormation',
        'matricule',
        'idModule',
        'idGroupePhysique',
        'dateEFMPre',
        'dateEFMReal',
    ];

    public function formateurs()
    {
        return $this->belongsTo(Formateur::class, 'matricule', 'matricule');
    }

    public function modules()
    {
        return $this->belongsTo(Module::class, 'idModule', 'id');
    }

    public function anneeFormation()
    {
        return $this->belongsTo(AnneeFormation::class, 'semaineAnneeFormation', 'anneeFormation');
    }

    public function groupePhysique()
    {
        return $this->belongsTo(GroupePhysique::class, 'idGroupePhysique', 'id');
    }
}
