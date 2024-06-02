<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jour extends Model
{
    use HasFactory;
    protected $fillable=['libelle','is_feriee','id_Semaine','date_jours'];
    public $timestamps=false;
    public function semaine()
    {
        return $this->belongsTo(Semaine::class,'id_Semaine');
    }
}
