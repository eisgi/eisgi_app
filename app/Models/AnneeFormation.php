<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnneeFormation extends Model
{
    use HasFactory;
    protected $fillable = ['anneeFormation', 'dateDebutAnneeFormation', 'dateFinAnneeFormation'];
    public $timestamps = false;
    public function semaines()
    {
        return $this->hasMany(Semaine::class);
    }
    public function semestres()
    {
        return $this->hasMany(Semestre::class);
    }
}
