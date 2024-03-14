<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Formateur extends Model
{
    protected $fillable = ['nom', 'prenom', 'dateNaissance', 'dateRejoint', 'matricule', 'password'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($formateur) {
            $formateur->matricule = Str::random(8);
            $formateur->password = Str::random(12);
        });
    }
}
