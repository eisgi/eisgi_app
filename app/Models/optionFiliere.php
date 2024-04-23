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
    /**
     * Get the user that owns the optionFiliere
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'codeFiliere', 'codeFiliere');
    }

}
