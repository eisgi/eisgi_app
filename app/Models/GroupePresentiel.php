<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupePresentiel extends Model
{
    use HasFactory;

    protected $table = 'groupe_presentiels';
    protected $primaryKey = 'codeGroupePR';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'codeGroupePR',
        'libelleGroupePR',
        'annee',
        'typegroupe',
        'option_filieres_id',
        'groupe_physique_id'
    ];

    public function optionFiliere()
    {
        return $this->belongsTo(OptionFiliere::class);
    }
}
