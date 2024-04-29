<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupePhysique extends Model
{
    protected $table = 'groupe_physique';
    public $timestamps = false;
    protected $fillable = [
        'codeGroupePhysique',
        'libelleGroupe',
        'annee',
        'codeGroupeDS',
        'option_filieres_id',
    ];

    public function groupeDistanciel()
    {
        return $this->belongsTo(GroupeDistanciel::class, 'codeGroupeDS', 'codeGroupeDS');
    }

    public function optionFiliere()
    {
        return $this->belongsTo(OptionFiliere::class, 'option_filieres_id');
    }

}
