<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\User;
// use Illuminate\Support\Facades\Hash;

class Formateur extends Model
{
    protected $fillable = ['nom', 'prenom', 'dateNaissance', 'dateRejoint', 'matricule', 'password'];

    protected static function boot()
{
    parent::boot();

    static::creating(function ($formateur) {
        // Set matricule and password
        $formateur->matricule = Str::random(8);
        $formateur->password = Str::random(12);
    });

    static::created(function ($formateur) {
        // Ensure nom and prenom are set
        // Create corresponding User record
        $user = new User([
            'nom' => $formateur->nom,
            'prenom' => $formateur->prenom,
            'role' => 'FORM', // Assuming 'frm' is the role for formateurs
            'matricule' => $formateur->matricule,
            'password' => $formateur->password, // Hash the password
        ]);
        $user->save();
    });
}

}
