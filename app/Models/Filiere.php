<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    protected $primaryKey = 'codeFiliere';
    protected $fillable = [
        'codeFiliere',
        'libelleFiliere',
    ];
    public $timestamps = false;

    use HasFactory;
}
