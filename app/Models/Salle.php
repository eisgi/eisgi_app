<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{


    protected $fillable=[
        'codeSalle',
        'nomSalle'

    ];



    public $timestamps = false;


    use HasFactory;
}
