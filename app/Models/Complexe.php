<?php

namespace App\Models;

use Illuminate\Datablase\Eloquent\Model;

class Complexe extends Model
{
    protected $table = 'complexes';

    protected $fillable = [
        'nomComplexe',
    ];

    public $timestamps = false;
}
