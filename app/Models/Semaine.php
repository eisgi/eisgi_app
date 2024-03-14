<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Semaine extends Model
{
    use HasFactory;

    protected $fillable = ['codeSemaine', 'dateDebutSemaine', 'dateFinSemaine', 'anneeformation'];
    public $timestamps = false;

    public function anneeFormation()
    {
        return $this->belongsTo(AnneeFormation::class, 'anneeformation', 'anneeformation');
    }
}



