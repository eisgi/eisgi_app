<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    use HasFactory;
    protected $fillable=['codeSemestre','dateDebutSemestre','dateFinSemestre','anneeFormation'];
    public $timestamps=false;
    public function anneeFormation()
    {
        return $this->belongsTo(AnneeFormation::class);
    }
    public function semaines()
    {
        return $this->hasMany(Semaine::class);
    }
    
}
