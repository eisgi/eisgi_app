<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = [
        'codeModule',
        'libelleModule',
        'ordreModule',
        'MHT',
        'Coef',
        'EFM_Regional',
        'option_filieres_id',
        'semestreModule',
    ];

    public $timestamps = false;

    public function optionFiliere()
    {
        return $this->belongsTo(OptionFiliere::class, 'option_filieres_id');
    }
}
