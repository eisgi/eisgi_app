<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semaine extends Model
{
    use HasFactory;
    protected $fillable = ['codeSemaine', 'dateDebutSemaine', 'dateFinSemaine', 'anneeformation', 'created_at', 'updated_at'];
}

