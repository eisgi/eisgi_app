<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionFiliere extends Model
{
    use HasFactory;

    protected $table = 'option_filieres';

    protected $fillable = [
        'codeOptionFiliere',
        'libelleOptionFiliere',
        'annee',
        'codeFiliere',
    ];
    public $timestamps = false;

    // Define the relationship with the Filieres model
    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'codeFiliere', 'codeFiliere');
    }
}
