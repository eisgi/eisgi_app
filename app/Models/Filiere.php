<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    protected $fillable = [
        'codeFiliere',
        'libelleFiliere',
    ];
    use HasFactory;
}
