<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    use HasFactory;

    protected $fillable = [
        'NomEtablissement',
        'Adresse',
        'idComplexe',
    ];
    public $timestamps = false;
    
    public function complexe()
    {
        return $this->belongsTo(Complexe::class, 'idComplexe');
    }
}
