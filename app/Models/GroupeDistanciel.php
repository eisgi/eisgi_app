<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupeDistanciel extends Model
{
    use HasFactory;

    protected $table = 'groupe_distanciels';
    protected $primaryKey = 'codeGroupeDS';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'codeGroupeDS',
        'libelleGroupeDS',
        'nombreGroupeContenus',
        'annee',
        'typegroupe',
        'option_filieres_id',
    ];

    public function optionFiliere()
    {
        return $this->belongsTo(OptionFiliere::class);
    }
}
