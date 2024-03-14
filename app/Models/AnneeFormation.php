<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnneeFormation extends Model
{
    use HasFactory;

    protected $fillable = ['anneeFormation', 'dateDebutAnneeFormation', 'dateFinAnneeFormation'];
    public $timestamps = false;
    public function semaines()
    {
        return $this->hasMany(Semaine::class, 'anneeformation', 'anneeformation');
    }
}
