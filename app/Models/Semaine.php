<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Semaine extends Model
{
    use HasFactory;
    protected $fillable=['codeSemaine','dateDebutSemaine','dateFinSemaine','idSemestre','anneeFormation'];
    public $timestamps=false;
    public function anneeFormation()
    {
        return $this->belongsTo(AnneeFormation::class);
    }
    public function semestre()
    {
        return $this->belongsTo(Semestre::class);
    }
    public function jours()
    {
        return $this->hasMany(Jour::class);
    }
}
